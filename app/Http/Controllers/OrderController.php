<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // POST /checkout — Order place karo
    public function placeOrder(Request $request)
    {
        $request->validate([
            'email'          => 'required|email',
            'first_name'     => 'required|string|max:100',
            'last_name'      => 'required|string|max:100',
            'address_line1'  => 'required|string|max:255',
            'address_line2'  => 'nullable|string|max:255',
            'city'           => 'required|string|max:100',
            'state'          => 'required|string|max:100',
            'zip'            => 'required|string|max:20',
            'phone'          => 'required|string|max:20',
            'payment_method' => 'required|in:cod,card',
        ]);

        $cartItems = CartItem::with(['product', 'variant'])
            ->where('user_id', Auth::id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $subtotal = $cartItems->sum(fn($item) =>
            ($item->product->sale_price ?? $item->product->price) * $item->quantity
        );
        $tax      = round($subtotal * 0.08, 2);
        $total    = round($subtotal + $tax, 2);

        DB::beginTransaction();
        try {
            // Order create
            $order = Order::create([
                'user_id'         => Auth::id(),
                'order_number'    => Order::generateOrderNumber(),
                'total_amount'    => $total,
                'discount_amount' => 0,
                'shipping_amount' => 0,
                'status'          => 'pending',
                'payment_method'  => $request->payment_method,
                'payment_status'  => $request->payment_method === 'cod' ? 'pending' : 'paid',
            ]);

            // Order items
            foreach ($cartItems as $item) {
                $price = $item->product->sale_price ?? $item->product->price;
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $item->product_id,
                    'variant_id' => $item->variant_id,
                    'quantity'   => $item->quantity,
                    'unit_price' => $price,
                ]);

                // Stock kam karo
                if ($item->variant) {
                    $item->variant->decrement('stock_quantity', $item->quantity);
                }
            }

            // Shipping address
            ShippingAddress::create([
                'order_id'      => $order->id,
                'user_id'       => Auth::id(),
                'full_name'     => $request->first_name . ' ' . $request->last_name,
                'address_line1' => $request->address_line1,
                'address_line2' => $request->address_line2,
                'city'          => $request->city,
                'state'         => $request->state,
                'zip'           => $request->zip,
                'country'       => $request->country,
                'phone'         => $request->phone,
            ]);

            // Cart clear karo
            CartItem::where('user_id', Auth::id())->delete();

            DB::commit();

            return redirect()->route('order-confirmed')
                ->with('order_number', $order->order_number)
                ->with('order_total', $total);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // GET /cart — Cart page
    public function index()
    {
        $cartItems = CartItem::with(['product.primaryImage', 'variant'])
            ->where('user_id', Auth::id())
            ->get();

        $total = $cartItems->sum(fn($item) =>
            ($item->product->sale_price ?? $item->product->price) * $item->quantity
        );

        return view('cart', compact('cartItems', 'total'));
    }

  public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'color'      => 'nullable|string',
            'size'       => 'nullable|string',
            'quantity'   => 'required|integer|min:1',
        ]);

        $variantQuery = ProductVariant::where('product_id', $request->product_id);
        if ($request->filled('color')) $variantQuery->where('color', $request->color);
        if ($request->filled('size'))  $variantQuery->where('size', $request->size);
        $variant = $variantQuery->first();

        if (!$variant) {
            return response()->json(['success' => false, 'message' => 'Please select size and color.'], 404);
        }
        if ($variant->stock_quantity < $request->quantity) {
            return response()->json(['success' => false, 'message' => "Only {$variant->stock_quantity} pieces available."], 422);
        }

        $existing = CartItem::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->where('variant_id', $variant->id)->first();

        if ($existing) {
            $newQty = $existing->quantity + $request->quantity;
            if ($newQty > $variant->stock_quantity) {
                return response()->json(['success' => false, 'message' => "Only {$variant->stock_quantity} in stock."], 422);
            }
            $existing->update(['quantity' => $newQty]);
        } else {
            CartItem::create([
                'user_id'    => Auth::id(),
                'product_id' => $request->product_id,
                'variant_id' => $variant->id,
                'quantity'   => $request->quantity,
            ]);
        }

        $cartCount = CartItem::where('user_id', Auth::id())->sum('quantity');
        return response()->json(['success' => true, 'message' => 'Added to cart!', 'cart_count' => $cartCount]);
    }

public function update(Request $request, $id)
{
    $request->validate(['quantity' => 'required|integer|min:1']);
    $cartItem = CartItem::where('user_id', Auth::id())->findOrFail($id);
    $stock = $cartItem->variant->stock_quantity ?? 999;
    if ($request->quantity > $stock) {
        return response()->json(['success' => false, 'message' => "Only {$stock} in stock."], 422);
    }
    $cartItem->update(['quantity' => $request->quantity]);

    // Cart count bhi return karo
    $cartCount = CartItem::where('user_id', Auth::id())->sum('quantity');

    return response()->json([
        'success' => true,
        'new_quantity' => $cartItem->quantity,
        'cart_count' => $cartCount,
    ]);
}

    public function destroy($id)
    {
        CartItem::where('user_id', Auth::id())->findOrFail($id)->delete();
        $cartCount = CartItem::where('user_id', Auth::id())->sum('quantity');
        return response()->json(['success' => true, 'cart_count' => $cartCount]);
    }
}

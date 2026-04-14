<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'total_amount',
        'discount_amount',
        'shipping_amount',
        'status',
        'payment_method',
        'payment_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function shippingAddress()
    {
        return $this->hasOne(ShippingAddress::class);
    }

    // Unique order number: ORD-2024-00001
    public static function generateOrderNumber(): string
    {
        $year = now()->year;
        $last = self::whereYear('created_at', $year)->count() + 1;
        return 'ORD-' . $year . '-' . str_pad($last, 5, '0', STR_PAD_LEFT);
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }
    public function isDelivered(): bool
    {
        return $this->status === 'delivered';
    }
    public function isCancelled(): bool
    {
        return $this->status === 'cancelled';
    }
    public function isPaid(): bool
    {
        return $this->payment_status === 'paid';
    }
}

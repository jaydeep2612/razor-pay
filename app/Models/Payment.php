<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'order_id',
        'amount',
        'payment_method',
        'status',
        'transaction_reference',
        'paid_at',
        'restaurant_id',
        'branch_id',
        'restaurant_id', // 👈 Isko add karna sabse zaroori hai
        'subtotal', // 👈 Naya field
        'discount_amount', // 👈 Naya field
        'tax_amount',
        'extra_charges', // 👈 Naya field

    ];

    public const STATUS_PENDING    = 'pending';
    public const STATUS_INITIATED  = 'initiated';
    public const STATUS_PROCESSING = 'processing';
    public const STATUS_PAID       = 'paid';
    public const STATUS_FAILED     = 'failed';

    protected $guarded = [];

    protected $casts = [
        'expires_at'  => 'datetime',
        'verified_at' => 'datetime',
        'paid_at'     => 'datetime',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}

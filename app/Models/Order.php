<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['quantity', 'order_shopify_id', 'line_item_id', 'price', 'total_price', 'variant_id', 'shop_id'];

    protected $cast = [
        'created_at' => 'date'
    ];

    public function Variant()
    {
        return $this->belongsTo(Variant::class);
    }

    public function shopOwner()
    {
        return $this->belongsTo(User::class, 'shop_id');
    }

    public function scopeCreatedLast(Builder $builder, int $day)
    {
        return $builder->whereBetween(
            'orders.created_at',
            [Carbon::now()->subDays($day), Carbon::now()]
        );
    }
}

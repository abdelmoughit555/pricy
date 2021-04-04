<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = ['quantity', 'order_shopify_id', 'line_item_id', 'price', 'total_price', 'split_cycle_id', 'split_cycle_id'];

    protected $cast = [
        'created_at' => 'date'
    ];

    public function splitCycle()
    {
        return $this->belongsTo(SplitCycle::class);
    }

    public function scopeCreatedLast(Builder $builder, int $day)
    {
        return $builder->whereBetween(
            'orders.created_at',
            [Carbon::now()->subDays($day), Carbon::now()]
        );
    }
}

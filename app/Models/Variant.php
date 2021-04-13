<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = ['uuid', 'variant_name', 'split_cycle_id', 'variant_id', 'old_price', 'new_price'];

    protected $withSum = ['orders, total_price'];

    public static function boot()
    {
        parent::boot();

        static::creating(function (Variant $variant) {
            $variant->uuid = (string) Str::uuid();
        });
    }

    public function splitCycle()
    {
        return $this->belongsTo(SplitCycle::class, 'split_cycle_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SplitTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'title',
        'product_id'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function (SplitTest $splitTest) {
            $splitTest->uuid = (string) Str::uuid();
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function splitCycles()
    {
        return $this->hasMany(SplitCycle::class);
    }
}

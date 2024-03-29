<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'uuid',
        'shop_id',
        'shopify_product_id',
        'image',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function (Product $product) {
            $product->uuid = (string) Str::uuid();
        });
    }

    public function shopOwner()
    {
        return $this->belongsTo(User::class, 'shop_id');
    }

    public function splitTests()
    {
        return $this->hasMany(SplitTest::class);
    }

    public function hasActiveSplitTest()
    {
        return $this->splitTests()->whereIn('status', [SplitTest::PENDING, SplitTest::RUNNING])->exists();
    }

    public function deleteRelatedRelationship()
    {
        $this->splitTests->each(function ($splitTest) {
            $splitTest->splitCycles->each(function ($splitCycle) {
                $splitCycle->delete();
            });
            $splitTest->delete();
        });
    }
}

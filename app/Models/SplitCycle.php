<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SplitCycle extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'cycle_date',
        'split_test_id',
        'variant_id',
        'price',
    ];

    protected $cast = [
        'cycle_date' => 'date'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function (SplitCycle $split_cycle) {
            $split_cycle->uuid = (string) Str::uuid();
        });
    }

    public function splitTest()
    {
        return $this->belongsTo(SplitTest::class);
    }
}

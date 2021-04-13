<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SplitCycle extends Model
{
    use HasFactory;

    const PENDING = "pending";
    const RUNNING = "running";
    const FINISHED = "finshed";

    protected $fillable = ['uuid', 'name', 'start_at', 'end_at', 'split_test_id', 'status', 'is_winner'];

    protected $cast = [
        'start_at' => 'date',
        'end_at' => 'date'
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

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    public function orders()
    {
        return $this->hasManyThrough(Order::class, Variant::class);
    }

    public function createNewCycle($varinatCycle)
    {
        return $this->create([
            'start_at' => '2020-12-02', // varinatCycle["start_at"],
            'end_at' => '2020-12-02', // varinatCycle["end_at"],
            'variant_id' => $varinatCycle['variant_id'],
            'new_price' => $varinatCycle['new_price'],
            'old_price' => $varinatCycle['old_price'],
            'status' => SplitCycle::PENDING
        ]);
    }
}

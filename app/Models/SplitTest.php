<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SplitTest extends Model
{
    const PENDING = "pending";
    const RUNNING = "running";
    const FINISHED = "finshed";

    use HasFactory, \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    protected $fillable = [
        'uuid',
        'title',
        'product_id',
        'shop_id',
        'status',
        'deadline'
    ];

    protected $cast = [
        'deadline' => 'date'
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

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

    public function shopOwner()
    {
        return $this->belongsTo(User::class, 'shop_id');
    }

    public function splitCycles()
    {
        return $this->hasMany(SplitCycle::class);
    }


    public function orders()
    {
        return $this->hasManyDeepFromRelations($this->splitCycles(), (new SplitCycle)->orders());
    }
}

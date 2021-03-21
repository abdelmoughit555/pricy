<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Osiset\ShopifyApp\Contracts\ShopModel as IShopModel;
use Osiset\ShopifyApp\Traits\ShopModel;
use Illuminate\Support\Str;

class User extends Authenticatable implements IShopModel
{
    use HasFactory, Notifiable, ShopModel;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_connection_at',
        'imported_product_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function firstConnection()
    {
        return is_null($this->first_connection_at);
    }

    public function alreadyImportatedProducts()
    {
        return !is_null($this->first_connection_at) && !is_null($this->imported_product_at);
    }

    public function isFetshingProducts()
    {
        return is_null($this->imported_product_at);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'shop_id');
    }

    public function storeProduct($product)
    {
        $this->products()->create([
            'uuid' => Str::uuid(),
            'title' => $product['title'],
            'shopify_product_id' => $product['id'],
            'image' => $product['image']['src'],
        ]);
    }

    public function fistConnectionAndImportatedAt()
    {
        $now = Carbon::now();
        $this->update([
            'first_connection_at' => $now,
            'imported_product_at' => $now
        ]);
    }

    public function getProduct(int $productId)
    {
        return collect(
            $this->api()->rest('GET', "/admin/products/{$productId}.json")['body']['product']
        );
    }
}

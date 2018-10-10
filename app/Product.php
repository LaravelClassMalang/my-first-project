<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	/**
	 * table name
	 * @var string
	 */
    protected $table = 'products';

    /**
     * available database field
     * @var array
     */
    protected $fillable = ['name', 'price', 'stock', 'description', 'photo'];

    public function users() {
      return $this->belongsToMany('App\User', 'orders', 'product_id', 'user_id');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    /**
	 * table name
	 * @var string
	 */
    protected $table = 'categories';

    protected $fillable = ['name'];

    public function post()
    {
        return $this->hasMany('App\Product');
    }

    public function products()
    {
    	return $this->hasMany('App\Product');
    }
}

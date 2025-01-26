<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //define both foreign key, user_id and product_id
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
        //connecting 'id' from user table and 'user_id' from cart table

    }

    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
        //connecting 'id' from products table and 'product_id' from cart table

    }
}

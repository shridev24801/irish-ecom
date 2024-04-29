<?php

namespace Irish\Ecom\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable =['title','price','image','description'];

    public static function get_product($post){

        $data = $post . 'hello everyone';
        return $data;

    }
}

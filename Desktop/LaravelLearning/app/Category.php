<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
      'hash_id', 'name'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

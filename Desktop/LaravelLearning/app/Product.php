<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 */
class Product extends Model
{
    protected $fillable = [
        'name', 'price'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}

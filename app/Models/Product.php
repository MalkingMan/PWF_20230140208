<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'qty',
        'price',
        'user_id',
        'category_id',
    ];

    /**
     * Product dimiliki oleh satu User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Product termasuk dalam satu Category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

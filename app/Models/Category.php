<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    /**
     * Satu Category memiliki banyak Product.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

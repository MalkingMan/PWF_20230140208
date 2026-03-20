<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Kategori;

class Product extends Model
{
    protected $fillable = [
        'name',
        'qty',
        'price',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kategoris()
    {
        return $this->hasMany(Kategori::class);
    }
}

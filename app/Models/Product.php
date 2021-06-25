<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'users_id', 'categories_id', 'name', 
        'slug', 'price', 'description'
    ];

    protected $hidden = [];

    protected $guarded = [];

    public function galleries() {
        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
    }

    public function user() {
        // urutan:
        // return $this->hasOne(namaModel::class, local_key, foreign_key)
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
}

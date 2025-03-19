<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';
    protected $primaryKey = 'id_item';
    protected $fillable = ['item_name', 'id_category', 'stock'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}

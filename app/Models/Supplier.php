<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['name', 'quantity', 'price', 'category_id', 'supplier_id'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}

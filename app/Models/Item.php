<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'arabic_name', 'price', 'stock'];

    public function salesEntries()
    {
        return $this->hasMany(SalesEntry::class);
    }
}

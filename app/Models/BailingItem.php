<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataType extends Model
{
    use HasFactory;

    public function bailingItems()
    {
        return $this->belongsToMany(Sorting::class);
    }
}

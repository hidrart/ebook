<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'description'
    ];

    protected $load = ['order'];

    public function order() {
        return $this->belongsTo(Order::class);
    }
}

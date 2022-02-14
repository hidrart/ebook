<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    protected $load = ['user'];
    protected $book = ['book'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function book() {
        return $this->hasMany(Book::class);
    }
}

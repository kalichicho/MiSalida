<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'categories',
        'rate',
        'zone',
        'languages',
        'active',
        'views_count',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

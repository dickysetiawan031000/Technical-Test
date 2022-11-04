<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'image',
        'title',
        'content',

    ];

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}

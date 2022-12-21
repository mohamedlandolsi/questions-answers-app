<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'user_id', 'category_id', 'slug', 'type_id'];

    protected $with = ['category', 'user', 'type'];

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stats()
    {
        return $this->belongsTo(Stats::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function types()
    {
        return $this->belongsTo(Type::class);
    }
}

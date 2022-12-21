<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = ['body', 'user_id', 'category_id', 'slug', 'type_id'];
    protected $guarded = [];
    protected $with = ['category', 'user'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) => 
            $query
                ->where('body', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
        );

        $query->when($filters['type'] ?? false, fn($query, $type) => 
            $query->whereHas('type', fn($query) => $query->where('slug', $type)));
    }

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

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function space()
    {
        return $this->belongsTo(Space::class);
    }

}

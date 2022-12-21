<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function spaceIcon()
    {
        return '/storage/' . ($this->icon) ? $this->image : '/storage/uploads/eWEScfcbiERkIAwhE1mAekEwtIk63k9Yi6Cq1JOW.jpg';
    }
}

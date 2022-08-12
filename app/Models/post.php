<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // dont forget to guard it later on
    protected $guarded = [];

    protected $with = ['category', 'author'];
    // search for querys in title and body fields
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) => $query
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%'));
    }
    // checks if it posts belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // checks if post belongs to wich author
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

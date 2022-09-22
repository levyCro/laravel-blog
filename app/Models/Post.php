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
        $query->when($filters['search'] ?? false, fn ($query, $search) => 
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')));
    // getting the data from catgory with same id as post
        $query->when($filters['category'] ?? false, fn ($query, $category) => 
                $query->whereHas('category', fn ($query) => 
                $query->where('slug', $category)));

        $query->when($filters['author'] ?? false, fn ($query, $author) => 
                $query->whereHas('author', fn ($query) => 
                $query->where('username', $author)));
    }
    // a post can have many comments.
    public function comments()
    {
        return $this->hasMany(Comment::class);
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

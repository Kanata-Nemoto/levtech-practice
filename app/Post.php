<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use SoftDeletes;
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    protected $fillable = [
        'title',
        'body',
        'category_id'
    ];
    
    function getPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}

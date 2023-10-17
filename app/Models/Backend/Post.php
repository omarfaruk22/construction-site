<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $dates = ['created_at', 'updated_at'];
    public function blogs(){
        
        return $this->hasMany(Comment::class,'post_id','id');
    
    
    }
}

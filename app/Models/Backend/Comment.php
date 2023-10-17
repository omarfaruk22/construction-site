<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'post_id',
        'email',
        'comment',
        'status'
        
    ];
    public function blogs(){
        
        return $this->belongsTo(Post::class,'post_id','id');
    
    
    }
}

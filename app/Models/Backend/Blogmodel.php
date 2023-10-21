<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogmodel extends Model
{
    use HasFactory;
    public function blogcat(){
        
        return $this->belongsTo(Category::class,'cat_id','id');
    
    
    }
    protected $dates = ['created_at', 'updated_at'];
    public function bgcomment(){
        
        return $this->hasMany(Blogcomment::class,'blog_id','id');
    
    
    }
}

<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogcomment extends Model
{
    use HasFactory;
    public function bgblogs(){
        
        return $this->belongsTo(Blogmodel::class,'blog_id','id');
    
    
    }
}

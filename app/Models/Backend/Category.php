<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function blognam(){
        
        return $this->hasmany(Blogmodel::class,'cat_id','id');
    
    
    }
}

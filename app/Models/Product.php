<?php

namespace App\Models;

use App\Models\Image;
use Laravel\Scout\Searchable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Searchable;
    
    
    public function toSearchableArray(){
        // $category = $this->category;
        $array = [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
            'category' => $this->category,
            
        ];
        return $array;
    }
    
    protected $fillable = ['title' , 'body' , 'price','category_id','user_id'];
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function formatData(){
        
        return $this->created_at->format('d/m/y');
    }
    
    public function getDescriptionSubstring(){
        
        if(strlen($this->body) > 12){
            return substr($this->body , 0, 12) . '...';
        }else{
            return $this->body;
        }
    }
    
    public static function toBeRevisionedCount(){
        return Product::where('is_accept', null)->where('user_id', '!=', Auth::user()->id)->count(); 
    }
    
    public function setAccept($value){
        
        $this->is_accept = $value;
        $this->save();
        return true;
    }
    
    public function images(){
        
        return $this->hasMany(Image::class);
    }
    
}


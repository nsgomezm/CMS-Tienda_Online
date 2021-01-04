<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produt extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'status', 'slug', 'category_id', 'image', 'price', 'is_descount', 'descount', 'description',
    ];
    
    protected function setDescriptionAttribute($value){
        $this->attributes['description'] = htmlspecialchars($value);
    }

    protected function getDescriptionAttribute($value){
        return html_entity_decode($value);
    }

    protected function getImageNameAttribute(){
        $data = explode('/', $this->image);
        return end( $data );
    }
    
    protected $casts = [
        'status' => 'boolean',
        'is_descount' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function photos(){
        return $this->hasMany('App\Models\Gallery', 'product_id');
    }
}

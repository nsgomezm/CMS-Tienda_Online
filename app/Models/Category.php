<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'slug', 'module', 'type_icon', 'icon', 
    ];

    function setIconAttribute($value){ $this->attributes['icon'] = htmlspecialchars($value); }

    function getIconAttribute($value){ return html_entity_decode($value); }

    function getFullIconAttribute(){
        if($this->type_icon != 'http'){
            return "<i class='{$this->type_icon} {$this->icon}'></i>";
        }
        return "<img src='http://{$this->icon}'></img>";
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
    
}

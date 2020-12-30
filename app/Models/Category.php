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

    function getFullIconAttribute(){
        return "<i class='{$this->type_icon} {$this->icon}'></i>";
    }
    function getFullImageCategoryAttribute(){
        return "<img src='http://{$this->icon}'></img>";
    }

    function setNameAttribute($value){ $this->attributes['name'] = e($value); }
    function setIconAttribute($value){ $this->attributes['icon'] = e($value); }
}

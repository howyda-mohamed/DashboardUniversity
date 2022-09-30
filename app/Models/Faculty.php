<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $table="faculties";
    protected $fillable = [
        'title_ar',
        'sub_title_ar',
        'location_ar',
        'phone_ar',
        'description_ar',
        'title_en',
        'sub_title_en',
        'location_en',
        'phone_en',
        'description_en',
        'image',
        'link',
        'created_at',
        'updated_at'
    ];
    public function scopeSelection($query)
    {
        return $query->select('id','title_ar','sub_title_ar','description_ar','location_ar','phone_ar','title_en','sub_title_en','description_en','location_en','phone_en','image','link');
    }
    public function getImageAttribute($val)
    {
        return($val !== NULL) ? asset($val) : "";
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Squad extends Model
{
    use HasFactory;

    protected $table="squads";
    protected $fillable = [
        'name_ar',
        'name_en',
        'created_at',
        'updated_at',
    ];
    public function scopeSelection($query)
    {
        return $query->select('id','name_ar','name_en');
    }
}

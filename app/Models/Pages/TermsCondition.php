<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class TermsCondition extends Model
{
    use HasFactory;
    protected $table = 'terms_conditions';

    protected $fillable = [
        'id', 'name','slug','photo','active','seo_title','seo_keyword','seo_description','created_at','updated_at'
    ];

    public $timestamps = true;

    // deze een globaal scope om een active product of winkel te laat zien with Methode(where('active',1))
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeSelection($query)
    {

        return $query->select('id', 'name', 'slug', 'photo', 'active','seo_title','seo_keyword','seo_description','created_at');
    }
    public function getActive()
    {
        $inactive = 'غير مفعل';
        $active = 'مفعل';
        return $this->active == 1 ? $active  : $inactive;

    }

    //whene you get Photo from database (automacly added http://dominName/assets/)
    //that is made with standard method (asset)
    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset('assets/' . $val) : "";

    }
}

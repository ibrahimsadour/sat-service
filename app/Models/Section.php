<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $table = 'sections';

    protected $fillable = [
        'id', 'name','slug','description','seo_title','seo_keyword','seo_description','photo','active','created_at','updated_at'
    ];

    public $timestamps = true;

    // deze een globaal scope om een active product of winkel te laat zien with Methode(where('active',1))
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeSelection($query)
    {

        return $query->select('id', 'name', 'slug', 'photo', 'active', 'created_at');
    }

    public function getActive()
    {
        $inactive = 'غير مفعل';
        $active = 'مفعل';
        return $this->active == 1 ? $active : $inactive;

    }
//    // Remove space from the photo
//    function remove_space ($section){
//        return str_replace(' ', '_', $section->photo);
//    }

    //whene you get Photo from database (automacly added http://dominName/assets/)
    //that is made with standard method (asset)
    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset('assets/' . $val) : "";

    }
    ################## Begin articels Relation  #####################
    //   Get all articles of the service
    public function articles(){
        return $this->hasMany(Article::class,'section_id','id');
    }
    // Get all tags of the one section
    public function tags(){
        return $this->belongsToMany(Tag::class, 'section_tag','section_id','tag_id');
    }
    ################## End cities Relation    #####################
}

<?php

namespace App\Models;
use App\Models\Car;
use App\Models\City;
use App\Models\Service;
use App\Models\Tag;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'id','section_id','car_id','city_id','service_id','description','tags', 'name','slug','photo','active','seo_title','seo_keyword','seo_description','created_at','updated_at'
    ];
    protected $hidden = ['pivot'];
    public $timestamps = true;

    // deze een globaal scope om een active product of winkel te laat zien with Methode(where('active',1))
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeSelection($query)
    {
        return $query->select('id','section_id','car_id','city_id','service_id','description', 'name','slug','photo','active','seo_title','seo_keyword','seo_description','created_at','updated_at');
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
    ################## Begin cars Relation  #####################
    //   Get all cars
    public function car(){
        return $this->belongsTo(Car::class,'car_id','id');
    }
    ################## End cars Relation    #####################

    ################## Begin cities Relation  #####################
    //   Get all cities
    public function city(){
        return $this->belongsTo(City::class,'city_id','id');
    }
    ################## End cities Relation    #####################

    ################## Begin services Relation  #####################
    //   Get all services
    public function service(){
        return $this->belongsTo(\App\Models\Service::class,'service_id','id');
    }
    ################## End cities Relation    #####################

    ################## Begin services Relation  #####################
    //   Get all services
    public function section(){
        return $this->belongsTo(\App\Models\Section::class,'section_id','id');
    }
    ################## End cities Relation    #####################

    ################## Begin tags Relation  #####################
    //   Get all tags of the one article
    public function tags(){
        return $this->belongsToMany(Tag::class, 'article_tag','article_id','tag_id');
    }
    ################## End tags Relation    #####################
}


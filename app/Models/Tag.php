<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    protected $fillable = [
        'id', 'name', 'slug','description','seo_title','seo_keyword','seo_description','active','section_id','created_at','updated_at'
    ];
    protected $hidden = ['pivot','created_at','updated_at'];

    public $timestamps = true;

    // deze een globaal scope om een active product of winkel te laat zien with Methode(where('active',1))
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeSelection($query)
    {

        return $query->select('id', 'name', 'slug','description','seo_title','seo_keyword','seo_description','active','created_at');
    }
    public function getActive()
    {
        $inactive = 'غير مفعل';
        $active = 'مفعل';
        return $this->active == 1 ? $active  : $inactive;

    }
    //   Get articles of the one tag
    public function articles(){
            return $this->belongsToMany(Article::class, 'article_tag','article_id','tag_id');
    }

    //   Get cars of the one tag
    public function cars(){
        return $this->belongsToMany(Car::class, 'car_tag','tag_id','car_id');
    }
    //   Get sub cars of the one tag
    public function sub_cars(){
        return $this->belongsToMany(Car::class, 'sub_car_tag','tag_id','sub_car_id');
    }
    //  Get cities of the one tag
    public function cities(){
        return $this->belongsToMany(City::class, 'city_tag','tag_id','city_id');
    }
    //   Get all tags of this section
    public function sections(){
        return $this->belongsToMany(Section::class,'section_tag','tag_id','section_id');
    }
    ################## End tags Relation    #####################
}

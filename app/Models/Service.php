<?php

namespace App\Models;
use App\Models\Article;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';

    protected $fillable = [
        'id', 'name', 'slug','description','seo_title','seo_keyword','seo_description','active','created_at','updated_at'
    ];

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
    ################## Begin articels Relation  #####################
    //   Get all articles of the service
    public function articles(){
        return $this->hasMany(Article::class,'service_id','id');
    }
    ################## End cities Relation    #####################
}

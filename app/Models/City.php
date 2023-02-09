<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $fillable = [
        'id ', 'name','slug','active','created_at','updated_at'
    ];

    public $timestamps = true;

    // deze een globaal scope om een active product of winkel te laat zien with Methode(where('active',1))
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeSelection($query)
    {

        return $query->select('id', 'name', 'slug', 'active','created_at');
    }
    public function getActive()
    {
        $inactive = 'غير مفعل';
        $active = 'مفعل';
        return $this->active == 1 ? $active  : $inactive;

    }
    ################## Begin cities Relation  #####################
    //   Get all articles of the city
    public function articles(){
        return $this->hasMany(Article::class,'car_id','id');
    }
    ################## End cities Relation    #####################
    // Get all tags of the one city
    public function tags(){
        return $this->belongsToMany(Tag::class, 'city_tag','city_id','tag_id');
    }

}

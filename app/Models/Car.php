<?php

namespace App\Models;
use \App\Models\Article;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class   Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $fillable = [
        'id', 'name','slug','photo','active','created_at','updated_at'
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

        return $query->select('id', 'name', 'slug', 'photo', 'active','created_at');
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

    //   Get all articles of the car
    public function articles(){
            return $this->hasMany(Article::class,'car_id','id');
    }

    // Get all tags of the one car
    public function tags(){
        return $this->belongsToMany(Tag::class, 'car_tag','car_id','tag_id');
    }

    // Get all sub-cars of the one car
    public function sub_cars(){
        return $this->hasmany(SubCar::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCar extends Model
{
    use HasFactory;

    protected $table = 'sub_cars';

    protected $fillable = [
        'id', 'name','slug','photo','active','created_at','car_id'
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

        return $query->select('id', 'name', 'slug', 'photo', 'active','car_id','created_at');
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

    // Get all tags of the one sub car
    public function tags(){
        return $this->belongsToMany(Tag::class, 'sub_car_tag','sub_car_id','tag_id');
    }

    // // Get the of this sub_cars
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

}
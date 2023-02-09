<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Google extends Model
{
    use HasFactory;

    protected $table = 'google';

    protected $fillable = [
        'id','title', 'code','place','active'
    ];
    protected $hidden = ['created_at','updated_at'];

    public $timestamps = true;

    // deze een globaal scope om een active product of winkel te laat zien with Methode(where('active',1))
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeSelection($query)
    {

        return $query->select('code','title','active');
    }
    public function getActive()
    {
        $inactive = 'غير مفعل';
        $active = 'مفعل';
        return $this->active == 1 ? $active  : $inactive;

    }
    ################## End tags Relation    #####################
}


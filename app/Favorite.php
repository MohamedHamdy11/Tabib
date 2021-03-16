<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table    = 'favorites';

    //protected $fillable = ['user_id', 'vendor_id'];
    protected $guarded =[];
    protected $hidden =['user_id','vendor_id','created_at','updated_at'];

    public function vendors()
    {
        return $this->hasMany(Vendor::class,'id', 'vendor_id' );
    }

    

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Vendor extends Model implements TranslatableContract
{
    use Translatable; 
    public $translatedAttributes = ['name', 'service', 'address', 'about'];

    protected $table   = 'vendors';
    protected $guarded = []; //this is return all column


    public function categories() {
        return $this->belongsTo('\App\Category', 'category_id');
    }


    // public function favorites(){
    //     return $this->morphMany(Favorite::class, 'favoritable');
    // }

    public function City_id() {
		return $this->hasOne('App\City', 'id', 'City_id');
	}

    public function incrementViewCount() {
        $this->views++;
        return $this->save();
    } 


}


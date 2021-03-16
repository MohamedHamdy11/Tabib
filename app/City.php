<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class City extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['city_name'];

	protected $table    = 'cities';
	protected $guarded = []; //this is return all column

	public function country_id() {
		return $this->hasOne('App\Country', 'id', 'country_id');
	}


} // end of model 

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class Country extends Model implements TranslatableContract
{
    use Translatable;
    public $translatedAttributes = ['country_name'];


    protected $table   = 'countries';
	protected $guarded = []; //this is return all column

}

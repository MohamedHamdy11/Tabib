<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends Model implements TranslatableContract
{
    
    use Translatable;
    public $translatedAttributes = ['name'];

    protected $table    = 'categories';
    protected $guarded = []; //this is return all column

    protected $hidden = ['created_at','updated_at'];

    public function parents() {
		return $this->hasMany('App\Category', 'id', 'parent');
	}

    public function vendors() {
        return $this->hasMany('\App\Vendor', 'category_id');
    }


}

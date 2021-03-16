<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class MedicalInformation extends Model implements TranslatableContract
{
    use Translatable; //  To add translation methods
    public $translatedAttributes = ['body'];

    protected $table = 'medical_information';

    protected $guarded =[];

    // public function incrementViewCount() {
    //     $this->views++;
    //     return $this->save();
    // }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorTranslation extends Model
{
    protected $fillable = ['name', 'service', 'address', 'about'];
    public $timestamps = false;
    
}

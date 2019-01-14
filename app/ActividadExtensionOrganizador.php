<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadExtensionOrganizador extends Model
{
    protected $fillable = [
        'actividad_extension_id', 'organizador'
    ]; //
    public function actividad(){
        return $this->belongsTo('App\ActividadExtension');
    }
}

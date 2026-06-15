<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaTelefono extends Model
{
    use HasFactory;
    protected $table = 'persona_telefono';
    protected $fillable = ['segunda_cedula', 'segundo_nombre', 'segundo_apellido', 'segundo_telefono', 'segunda_ubicacion', 'segundo_cargo',
     'segundo_acueducto', 'segundo_departamento', 'marca', 'color', 'serial', 'cargador', 'protector_pantalla', 'forro'];

}

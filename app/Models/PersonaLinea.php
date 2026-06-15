<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaLinea extends Model
{
    use HasFactory;
    protected $table = 'persona_linea';
    protected $fillable = ['segunda_cedula', 'segundo_nombre', 'segundo_apellido', 'segundo_telefono', 'segunda_ubicacion', 'segundo_cargo',
     'segundo_acueducto', 'segundo_departamento', 'numero_linea', 'numero_sim', 'id_retiro', 'status'];

}

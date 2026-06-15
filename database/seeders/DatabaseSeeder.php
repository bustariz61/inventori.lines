<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Acueducto;
use App\Models\Cargo;
use App\Models\Departamento;
use Illuminate\Database\Seeder;
use App\Models\Persona;
use App\Models\Telefonia;
use App\Models\Usuario;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test  User',
        //     'email' => 'test@example.com',
        // ]);

        
       /* $departamento = new Departamento();
        $departamento->nombre ="hola"  ;
        $departamento->save();*/
        $acueducto = new Acueducto();
        $acueducto->nombre = "Sede Central";
        $acueducto->status = "activo";
        $acueducto->save();

        $usuario = new Usuario();
        $usuario->usuario = "juan";
        $usuario->contraseña = "123";
        $usuario->status = "activo";
        $usuario->save();

        $departamento = new Departamento();
        $departamento->nombre = "Gtic";
        $departamento->status = "xd";
        $departamento->save();

        $cargo = new Cargo();
        $cargo->nombre = "Informatico";
        $cargo->status = "xd";
        $cargo->save();

        $telefonia = new Telefonia();
        $telefonia->nombre = 'Movistar';
        $telefonia->status = 'activo';
        $telefonia->save();

        

        





    }
}

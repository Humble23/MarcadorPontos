<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $manager = User::create([
            'name' => 'Administrador',
            'document' => '90408084065',
            'occupation' => 'CEO',
            'role' => 'administrador',
            'email' => 'administrador@ticto.com',
            'birthdate' => now()->format('Y-m-d'),
            'zipcode' => '13092228',
            'address' => 'Rua Pedro Santucci',
            'number' => '13',
            'complement' => '',
            'neighborhood' => 'Jardim Carlos Gomes',
            'city' => 'Campinas',
            'state' => 'SP',
            'password' => '$2a$10$J99WxYJ1NDR.C4Q6.OvuuuwWdnLL0Oi56TAhP1kYG/v/6mA/J/n.y',
        ]);

        User::create([
            'name' => 'Edilson Fernandes',
            'document' => '11872150403',
            'occupation' => 'CEO',
            'role' => 'funcionario',
            'email' => 'edilsonfernandes312@gmail.com',
            'birthdate' => '1994-10-20',
            'zipcode' => '59255000',
            'address' => 'Rua do Berilo',
            'number' => '303',
            'complement' => '',
            'neighborhood' => 'Lagoa Nova',
            'city' => 'Natal',
            'state' => 'RN',
            'password' => '$2a$10$12g8ACDrWBXB.e0GxcPxy.dFwknBYUw9axY.5fBgom8XijDEdUnLy',
            'manager_id' => $manager->id,
        ]);
    }
}

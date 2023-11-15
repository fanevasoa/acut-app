<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $role = Role::where('name', 'admin')->first();

        if (!$role) {
            Role::create(['name' => 'admin']);
        }

        $user = User::where('email', 'admin@acu.com')->first();

        if (!$user) {
            $user = User::factory()->create([
                'name'                 => 'admin',
                'email'                => 'admin@acu.com',
                'email_verified_at'    => now(),
                'password'             => Hash::make('password'),
                'password_must_change' => false,
            ]);
        }

        $user->assignRole('admin');

        $roles = [
            'aumonie',
            'aine_spirituel',
            'president',
            'conseille',
            'secretaire',
            'tresorier',
            'commissaire_compte',
            'responsable_materiel',
            'sacristain',
            'responsable_liturgie',
            'responsable_bibliotheque',
            'responsable_social',
            'responsable_fanjary',
            'president_gffm',
        ];

        foreach ($roles as $role) {
            if (!Role::where('name', $role)->first()) {
                Role::create(['name' => $role]);
            }
        }
    }
}

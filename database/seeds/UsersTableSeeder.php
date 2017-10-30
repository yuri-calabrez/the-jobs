<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@user.com',
            'password' => bcrypt('123456')
        ])->each(function(\App\Models\User $user){
            $admin = \App\Models\Admin::create([]);
            $user->userable()->associate($admin);
            $user->save();
        });

        factory(\App\Models\User::class)->create([
            'name' => 'Candidato',
            'email' => 'candidate@user.com',
            'password' => bcrypt('candidate')
        ])->each(function (\App\Models\User $user) {
           if(!$user->userable) {
               $candidate = factory(\App\Models\Candidate::class)->create();
               $user->userable()->associate($candidate);
               $user->save();
           }
        });

        factory(\App\Models\User::class)->create([
            'name' => 'Recrutador',
            'email' => 'recruiter@user.com',
            'password' => bcrypt('recruiter')
        ])->each(function (\App\Models\User $user) {
            if(!$user->userable) {
                $company = factory(\App\Models\Company::class)->create();
                $user->userable()->associate($company);
                $user->save();
            }
        });
    }
}

<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        if (!$user->find(1)){
            $user->id = 1;
            $user->name = 'Administrador';
            $user->login = 'admin';
            $user->ativo = 1;
            $user->email = 'josemar.neri@yahoo.com.br';
            $user->password = bcrypt('admin');
            $user->remember_token = bcrypt(csrf_token());
            $user->save();
            
            $user2 = new User();
            $user2->id = 2;
            $user2->name = 'Nulo';
            $user2->login = 'Nulo';
            $user2->ativo = 1;
            $user2->email = 'nulo@xx.xxx';
            $user2->password = bcrypt('nulo123');
            $user2->remember_token = bcrypt(csrf_token());
            $user2->save();
            
            $user2 = new User();
            $user2->id = 3;
            $user2->name = 'Josemar da Silva Neri';
            $user2->login = 'josemar';
            $user2->ativo = 1;
            $user2->email = 'josemar.neri@ideainstitute.it';
            $user2->password = bcrypt('123');
            $user2->remember_token = bcrypt(csrf_token());
            $user2->save();
            
            
        }
        
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UserSeeder');
        $this->call('RoleSeeder');
        $this->call('RoleUserSeeder');
        $this->call('PermissionSeeder');
        $this->call('FuncaoSeeder');
        $this->call('CargoSeeder');
        $this->call('FuncionarioSeeder');
        //$this->call('RdpSeeder');
        $this->call('ClienteSeeder');
        $this->call('OrcamentoSeeder');
        $this->call('ComessaSeeder');
        $this->call('CargaSeeder');
        //$this->call('ProjetoSeeder');
        $this->call('DesenhoSeeder');
    }
}

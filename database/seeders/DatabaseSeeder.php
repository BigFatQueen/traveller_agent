<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {     
        $array=['admin','customer','car','hotel'];
           foreach($array as $a){
             Role::create([
                'name'=>$a
             ]);
           }

        $administrator = User::create([
        'name' => 'Super Admin',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('123456789'),
      ]);

      $administrator->assignRole('admin');
        
        $this->call([

            TypeSeeder::class,
            BrandSeeder::class,
            FcategorySeeder::class,
        ]);    

        Type::create([
            "name"=>"Hotel",
            "parent_id"=>null
        ]);
        Type::create([
            "name"=>"CarTransport",
            "parent_id"=>null
        ]);
        Type::create([
            "name"=>"Package",
            "parent_id"=>null
        ]);

         
    }
}

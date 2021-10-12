<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\Type;
use App\Models\User;
use App\Models\Brand;
use App\Models\Fcategory;
use App\Models\Tour;
use App\Models\City;
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
        
    
        $this->typeSeeding();
         $this->citySeeding();
        $this->brandSeeding();
        $this->fcateogrySeeding();
        $this->tourSeeding();
        

         
    }

    public  function  citySeeding(){
        $arrray=['Yangon','Mandalay','Bagan'];

        foreach($arrray as $a){
            City::create([
                'name'=>$a
            ]);
        }
    }

    public  function  brandSeeding(){
        $arrray=['BMW', 'Ford', 'General Motors (GM)', 'Hyundai', 'KIA', 'Mercedes Benz', 'Nissan', 'Suzuki', 'TATA', 'Toyota'];

        foreach($arrray as $a){
            Brand::create([
                'name'=>$a
            ]);
        }
    }

    public function fcateogrySeeding(){
         $array=['Bathroom','Food & Drink','General Services','Bedroom','Media & Technology'];

        foreach($array as $a){
            Fcategory::create([
                'name'=>$a,
                'type_id'=>1
            ]);
        }
    }

    public function tourSeeding(){
        Tour::create([
            'city_id'=>1,
            'photo'=>'https://images.unsplash.com/photo-1530841377377-3ff06c0ca713?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3150&q=80',
            'title'=>'Oia, Santorini at sunset',
            'desc'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry.
             Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
        ]);

        Tour::create([
            'city_id'=>1,
            'photo'=>'https://images.unsplash.com/photo-1504512485720-7d83a16ee930?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1379&q=80',
            'title'=>'Asos, Greece',
            'desc'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry.
             Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
        ]);

        Tour::create([
            'city_id'=>2,
            'photo'=>'https://images.unsplash.com/photo-1506877339221-ede41280a7a2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1952&q=80',
            'title'=>'Oia, Greece',
            'desc'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry.
             Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
        ]);
    }


    public function typeSeeding(){
        $arr=['Hotel','CarTransport'];
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

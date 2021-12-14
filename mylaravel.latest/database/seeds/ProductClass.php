<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductClass extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
         for ($i = 0; $i < 50; $i++){
           $name = $faker->name;
           $id = DB::table('products')->insertGetId(
            [
                'code' => $this->generateRandomString(),
                'name' => $name,
                'slug' => Str::slug($name, '-'),
                'status' => '1',
                'category_id' => '1',
                'number' => '10',
                'price' => '100000',
                'status_hight_light' => '2',
                'user_id' => '1',
            ]
           );
           DB::table('images')->insert([
               [ 
                    'name' => '1635677176.sp.jpg',
                    'product_id' => $id,
               ],
               [
                    'name' => '1635677176.sp1.jpg',
                    'product_id' => $id,
               ],
               [
                    'name' => '1635677176.10a8682215124c2a910c2f57d0d5547b.jpg',
                    'product_id' => $id,    
               ]
            ]);
       }
    }

    function generateRandomString($length = 10){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++){
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return '#'.strtoupper($randomString);
    }
}
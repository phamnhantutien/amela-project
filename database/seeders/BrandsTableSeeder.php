<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand = new Brand();
        $brand->id = 1;
        $brand->name = 'Louis Vuitton';
        $brand->save();

        $brand = new Brand();
        $brand->id = 2;
        $brand->name = 'Gucci';
        $brand->save();
    }
}

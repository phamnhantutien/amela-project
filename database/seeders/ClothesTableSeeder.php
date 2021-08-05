<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cloth;

class ClothesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cloth = new Cloth();
        $cloth->cloth_name = 'Brown Short Taffeta Pants';
        $cloth->price = 1552090000;
        $cloth->description = 'Quần áo mới';
        $cloth->brand_id = 1;
        $cloth->image_url = 'images/bedPCVOTjD4WTnKCnFf8HAKJrD6RvO8O1jWQnvZw.jpg';
        $cloth->save();

        $cloth = new Cloth();
        $cloth->cloth_name = 'Beige Khaki Trousers Pants';
        $cloth->price = 4600000000;
        $cloth->description = 'Quần áo mới';
        $cloth->brand_id = 1;
        $cloth->image_url = 'images/bedPCVOTjD4WTnKCnFf8HAKJrD6RvO8O1jWQnvZw.jpg';
        $cloth->save();

        $cloth = new Cloth();
        $cloth->cloth_name = 'Short Sleeves Shirt';
        $cloth->price = 1552090000;
        $cloth->description = 'Quần áo mới';
        $cloth->brand_id = 1;
        $cloth->image_url = 'images/bedPCVOTjD4WTnKCnFf8HAKJrD6RvO8O1jWQnvZw.jpg';
        $cloth->save();

        $cloth = new Cloth();
        $cloth->cloth_name = 'Black Mini Skirt With Buttons';
        $cloth->price = 6700000000;
        $cloth->description = 'Quần áo mới';
        $cloth->brand_id = 2;
        $cloth->image_url = 'images/bedPCVOTjD4WTnKCnFf8HAKJrD6RvO8O1jWQnvZw.jpg';
        $cloth->save();

        $cloth = new Cloth();
        $cloth->cloth_name = 'Cream Leopard Midi Silk Dress';
        $cloth->price = 690000000;
        $cloth->description = 'Quần áo mới';
        $cloth->brand_id = 1;
        $cloth->image_url = 'images/bedPCVOTjD4WTnKCnFf8HAKJrD6RvO8O1jWQnvZw.jpg';
        $cloth->save();

        $cloth = new Cloth();
        $cloth->cloth_name = 'Leopard Prints Midi Silk Dress';
        $cloth->price = 55254000000;
        $cloth->description = 'Quần áo mới';
        $cloth->brand_id = 2;
        $cloth->image_url = 'images/bedPCVOTjD4WTnKCnFf8HAKJrD6RvO8O1jWQnvZw.jpg';
        $cloth->save();
    }
}

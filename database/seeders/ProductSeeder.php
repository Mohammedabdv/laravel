<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

    public function run(): void
    {
        Product::insert([
            [
                "name" => "كاميرا كانون",
                "description" => "",
                "imagepath" => "assets/img/c2.jpg",
                "price" => rand(10, 1000),
                "quantity" => rand(1, 500),
                "category_id" => 1,
            ],
            [
                "name" => "كاميرا لينكس",
                "description" => "",
                "imagepath" => "assets/img/c3.jpg",
                "price" => rand(10, 1000),
                "quantity" => rand(1, 500),
                "category_id" => 1,
            ],
            [
                "name" => "كاميرا سوني",
                "description" => "",
                "imagepath" => "assets/img/c4.jpg",
                "price" => rand(10, 1000),
                "quantity" => rand(1, 500),
                "category_id" => 1,
            ],
            [
                "name" => "ساعة رولكس",
                "description" => "",
                "imagepath" => "assets/img/w2.jpg",
                "price" => rand(10, 1000),
                "quantity" => rand(1, 500),
                "category_id" => 2,
            ],
            [
                "name" => "ساعة رياضية",
                "description" => "",
                "imagepath" => "assets/img/w3.jpg",
                "price" => rand(10, 1000),
                "quantity" => rand(1, 500),
                "category_id" => 2,
            ],
            [
                "name" => "ساعة احترافية",
                "description" => "",
                "imagepath" => "assets/img/w4.jpg",
                "price" => rand(10, 1000),
                "quantity" => rand(1, 500),
                "category_id" => 2,
            ],
            [
                "name" => "شنطة بناتي",
                "description" => "",
                "imagepath" => "assets/img/b2.jpg",
                "price" => rand(10, 1000),
                "quantity" => rand(1, 500),
                "category_id" => 3,
            ],
            [
                "name" => "شنطة نسائي",
                "description" => "",
                "imagepath" => "assets/img/b3.jpg",
                "price" => rand(10, 1000),
                "quantity" => rand(1, 500),
                "category_id" => 3,
            ],
            [
                "name" => "شنطة رجالي",
                "description" => "",
                "imagepath" => "assets/img/b4.jpg",
                "price" => rand(10, 1000),
                "quantity" => rand(1, 500),
                "category_id" => 3,
            ],
            [
                "name" => "روج",
                "description" => "",
                "imagepath" => "assets/img/m2.jpg",
                "price" => rand(10, 1000),
                "quantity" => rand(1, 500),
                "category_id" => 4,
            ],
            [
                "name" => "ماسكرة",
                "description" => "",
                "imagepath" => "assets/img/m3.jpg",
                "price" => rand(10, 1000),
                "quantity" => rand(1, 500),
                "category_id" => 4,
            ],
            [
                "name" => "ايلاينر",
                "description" => "",
                "imagepath" => "assets/img/m4.jpg",
                "price" => rand(10, 1000),
                "quantity" => rand(1, 500),
                "category_id" => 4,
            ],
            [
                "name" => "بلشر",
                "description" => "",
                "imagepath" => "assets/img/m5.jpg",
                "price" => rand(10, 1000),
                "quantity" => rand(1, 500),
                "category_id" => 4,
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run(): void
    {
        Category::insert([
            [
                "id" => 1,
                "name" => "كاميرات",
                "description" => "كاميرات الكترونية",
                "imagepath" => "assets/img/c1.jpg",
            ],
            [
                "id" => 2,
                "name" => "ساعات",
                "description" => "ساعات الكترونية",
                "imagepath" => "assets/img/w1.jpg",
            ],
            [
                "id" => 3,
                "name" => "شنط",
                "description" => "شنط الكترونية",
                "imagepath" => "assets/img/b1.jpg",
            ],
            [
                "id" => 4,
                "name" => "مكياج",
                "description" => "مكياج الكترونية",
                "imagepath" => "assets/img/m2.jpg",
            ]
        ]);
    }
}

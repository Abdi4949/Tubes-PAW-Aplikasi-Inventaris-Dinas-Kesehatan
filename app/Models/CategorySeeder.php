<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([

            "name" => "Roda 4",

        ]
    );
        Category::create([

            "name" => "Roda 2",

        ]
        );
        Category::create([

            "name" => "Elektronik",

        ]
        );
        Category::create([

            "name" => "Alat Medis",

        ]
        );
        Category::create([

            "name" => "",

        ]
        );
    }
}

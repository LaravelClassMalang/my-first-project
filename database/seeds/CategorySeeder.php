<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create category 10 rows
        factory(Category::class, 10)->create()
        // On each process would store product
        ->each(function ($category) {
            // Store products by calling relation
            $category->products()->save(factory(App\Product::class)->make());
        });
        // for ($i=0; $i < 10; $i++) { 
        // 	Category::create(['name' => 'Category '.$i]);
        // }
    }
}

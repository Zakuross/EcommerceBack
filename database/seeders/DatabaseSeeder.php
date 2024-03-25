<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    use WithoutModelEvents;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()
            ->create();

        Service::factory()
            ->count(10)
            ->for($user)
            ->create();

        Blog::factory()
            ->count(10)
            ->for($user)
            ->create();

        $category = Category::factory()
            ->create();

        $order = Order::factory()
            ->count(10)
            ->for($user)
            ->create();

        Product::factory()
            ->count(10)
            ->for($category)
            ->hasAttached($order, ['quantity'=> 5])
            ->hasAttached($user, ['comment'=>'Neuille'])
            ->create();






    }
}

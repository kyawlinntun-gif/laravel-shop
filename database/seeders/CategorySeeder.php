<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::findOrFail(1)->admin->categories()->create(['name' => "Electronics"]);
        User::findOrFail(1)->admin->categories()->create(['name' => 'Fashion']);
        User::findOrFail(1)->admin->categories()->create(['name' => 'Home Appliances']);
        User::findOrFail(1)->admin->categories()->create(['name' => 'Books']);
        User::findOrFail(1)->admin->categories()->create(['name' => 'Beauty Products']);
        User::findOrFail(1)->admin->categories()->create(['name' => 'Sports Equipments']);
        User::findOrFail(1)->admin->categories()->create(['name' => 'Toys']);
        User::findOrFail(1)->admin->categories()->create(['name' => 'Groceries']);
        User::findOrFail(1)->admin->categories()->create(['name' => 'Furniture']);
        User::findOrFail(1)->admin->categories()->create(['name' => 'Stationery']);
    }
}

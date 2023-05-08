<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\Translation\Brand as TranslationBrand;
use App\Models\Translation\Category as TranslationCategory;
use App\Models\Translation\City as TranslationCity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // if(!Admin::count()) {
        //     Admin::create([
        //         'name' => 'Super Admin',
        //         'email' => 'superadmin@mqa.com',
        //         'password' => '12345678',
        //     ]);
        // }

    
    }
}

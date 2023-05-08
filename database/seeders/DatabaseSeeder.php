<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\Translation\Brand as TranslationBrand;
use App\Models\Translation\Category as TranslationCategory;
use App\Models\Translation\City as TranslationCity;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $brand = Brand::create([
            'id' => 1
        ]);

        TranslationBrand::create([
            'title' => 'BMW',
            'locale' => 'en',
            'brand_id' => $brand->id
        ]);
        TranslationBrand::create([
            'title' => 'بى ام دابيو',
            'locale' => 'ar',
            'brand_id' => $brand->id
        ]);


        $city = City::create([
            'id' => 1
        ]);

        TranslationCity::create([
            'title' => 'مدينه نصر',
            'locale' => 'ar',
            'city_id' => $city->id
        ]);
        TranslationCity::create([
            'title' => 'nase city',
            'locale' => 'en',
            'city_id' => $city->id
        ]);

        $category = Category::create([
            'id' => 1
        ]);

        TranslationCategory::create([
            'title' => 'cars',
            'locale' => 'en',
            'category_id' => $category->id
        ]);
        TranslationCategory::create([
            'title' => 'العربيات',
            'locale' => 'cars',
            'category_id' => $category->id
        ]);
    }
}

<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Repositories\Model\Entities\ProductCategory;

class ProductCategorySeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $data = [
            ['name' => 'Filtration', 'slug_name' => Str::slug('Filtration'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'HVAC', 'slug_name' => Str::slug('HVAC'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'General Supplies', 'slug_name' => Str::slug('General Supplies'), 'created_at' => now(), 'updated_at' => now()],
        ];

        ProductCategory::insert($data);
    }
}
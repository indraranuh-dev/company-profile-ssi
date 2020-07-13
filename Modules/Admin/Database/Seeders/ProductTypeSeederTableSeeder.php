<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Repositories\Model\Entities\ProductType;
use Illuminate\Support\Str;

class ProductTypeSeederTableSeeder extends Seeder
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
            ['name' => 'AC Perumahan', 'slug_name' => Str::slug('AC Perumahan'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AC Perumahan Premium', 'slug_name' => Str::slug('AC Perumahan Premium'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AC Komersial', 'slug_name' => Str::slug('AC Komersial'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Air Purifier', 'slug_name' => Str::slug('Air Purifier'), 'created_at' => now(), 'updated_at' => now()],
        ];

        ProductType::insert($data);
    }
}
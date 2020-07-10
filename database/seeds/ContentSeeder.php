<?php

use Illuminate\Database\Seeder;
use App\Content;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'About Me', 'slug_name' => Str::slug('About Me'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Services', 'slug_name' => Str::slug('Services'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Testimonials', 'slug_name' => Str::slug('Testimonials'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Portfolio', 'slug_name' => Str::slug('Portfolio'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        Content::insert($data);
    }
}
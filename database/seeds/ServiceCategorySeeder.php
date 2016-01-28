<?php

use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // public function run()
    
        //
        DB::table('service_category')->insert([
            'service_name' => 'Traffic Generation - SEO',
            'status' => 1,
        ]);

        DB::table('service_category')->insert([
            'service_name' => 'Traffic Generation - Social media',
            'status' => 1,
        ]);

        DB::table('service_category')->insert([
            'service_name' => 'Traffic Generation - PPC',
            'status' => 1,
        ]);

        DB::table('service_category')->insert([
            'service_name' => 'Traffic Generation - Content Marketing',
            'status' => 1,
        ]);

        DB::table('service_category')->insert([
            'service_name' => 'Development - Mobile',
            'status' => 1,
        ]);

        DB::table('service_category')->insert([
            'service_name' => 'Development - Web',
            'status' => 1,
        ]);

        DB::table('service_category')->insert([
            'service_name' => 'Product - Vender',
            'status' => 1,
        ]);
    
    }
}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('products')->truncate();
        DB::table('products')->insert([
            [
                'id' =>1,
                'name' => 'ao mua',
                'price' => 10000,
                'thumbnail' => 'https://xuongmaydosi.com/wp-content/uploads/2020/06/ao-mua-tien-loi-co-nut-dung-mot-lan-mau-do-danh-cho-nguoi-lon.jpg',
                'created_at' => Carbon::now(-1),
                'updated_at' => Carbon::now(-1),
            ],[
                'id' =>2,
                'name' => 'ao mua',
                'price' => 10000,
                'thumbnail' => 'https://xuongmaydosi.com/wp-content/uploads/2020/06/ao-mua-tien-loi-co-nut-dung-mot-lan-mau-do-danh-cho-nguoi-lon.jpg',
                'created_at' => Carbon::now(-1),
                'updated_at' => Carbon::now(-1),
            ],[
                'id' =>3,
                'name' => 'ao mua',
                'price' => 10000,
                'thumbnail' => 'https://xuongmaydosi.com/wp-content/uploads/2020/06/ao-mua-tien-loi-co-nut-dung-mot-lan-mau-do-danh-cho-nguoi-lon.jpg',
                'created_at' => Carbon::now(-1),
                'updated_at' => Carbon::now(-1),
            ],[
                'id' =>4,
                'name' => 'ao mua',
                'price' => 10000,
                'thumbnail' => 'https://xuongmaydosi.com/wp-content/uploads/2020/06/ao-mua-tien-loi-co-nut-dung-mot-lan-mau-do-danh-cho-nguoi-lon.jpg',
                'created_at' => Carbon::now(-1),
                'updated_at' => Carbon::now(-1),
            ],[
                'id' =>5,
                'name' => 'ao mua',
                'price' => 10000,
                'thumbnail' => 'https://xuongmaydosi.com/wp-content/uploads/2020/06/ao-mua-tien-loi-co-nut-dung-mot-lan-mau-do-danh-cho-nguoi-lon.jpg',
                'created_at' => Carbon::now(-1),
                'updated_at' => Carbon::now(-1),
            ],[
                'id' =>6,
                'name' => 'ao mua',
                'price' => 10000,
                'thumbnail' => 'https://xuongmaydosi.com/wp-content/uploads/2020/06/ao-mua-tien-loi-co-nut-dung-mot-lan-mau-do-danh-cho-nguoi-lon.jpg',
                'created_at' => Carbon::now(-1),
                'updated_at' => Carbon::now(-1),
            ],[
                'id' =>7,
                'name' => 'ao mua',
                'price' => 10000,
                'thumbnail' => 'https://xuongmaydosi.com/wp-content/uploads/2020/06/ao-mua-tien-loi-co-nut-dung-mot-lan-mau-do-danh-cho-nguoi-lon.jpg',
                'created_at' => Carbon::now(-1),
                'updated_at' => Carbon::now(-1),
            ],[
                'id' =>8,
                'name' => 'ao mua',
                'price' => 10000,
                'thumbnail' => 'https://xuongmaydosi.com/wp-content/uploads/2020/06/ao-mua-tien-loi-co-nut-dung-mot-lan-mau-do-danh-cho-nguoi-lon.jpg',
                'created_at' => Carbon::now(-1),
                'updated_at' => Carbon::now(-1),
            ],[
                'id' =>9,
                'name' => 'ao mua',
                'price' => 10000,
                'thumbnail' => 'https://xuongmaydosi.com/wp-content/uploads/2020/06/ao-mua-tien-loi-co-nut-dung-mot-lan-mau-do-danh-cho-nguoi-lon.jpg',
                'created_at' => Carbon::now(-1),
                'updated_at' => Carbon::now(-1),
            ],[
                'id' =>10,
                'name' => 'ao mua',
                'price' => 10000,
                'thumbnail' => 'https://xuongmaydosi.com/wp-content/uploads/2020/06/ao-mua-tien-loi-co-nut-dung-mot-lan-mau-do-danh-cho-nguoi-lon.jpg',
                'created_at' => Carbon::now(-1),
                'updated_at' => Carbon::now(-1),
            ]
        ]);
//        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

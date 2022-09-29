<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Image;
use App\Models\User;
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
        // truncate to create seed data again
        // User::truncate();
        // Category::truncate();
        // Image::truncate();
        // Customer::truncate();

        User::create([
            'name' => 'Win Wedding',
            'username' => 'thang23494',
            'email' => 'thang23494@gmail.com',
            'password' => bcrypt('!Thang23494')
        ]);

        $personal = Category::create([
            'name' => 'Cá Nhân',
            'slug' => 'ca-nhan'
        ]);

        $family = Category::create([
            'name' => 'Gia Đình',
            'slug' => 'gia-dinh'
        ]);

        $group = Category::create([
            'name' => 'Nhóm',
            'slug' => 'nhom'
        ]);

        $cus1 = Customer::create([

            'name' => 'Diễn Viên Trang Mù Tạt',
            'category_id' => $personal->id,
            'slug' => 'trang-mu-tat',
            'image' => 'anh1.jpg'
        ]);

        $cus2 = Customer::create([
            'category_id' => $family->id,
            'name' => 'Jun Vũ',
            'slug' => 'jun-vu',
            'image' => 'anh2.jpg'
        ]);

        $cus3 = Customer::create([
            'category_id' => $group->id,
            'name' => 'Ảnh Nhóm 1',
            'slug' => 'anh-nhom-1',
            'image' => 'anh3.jpg'
        ]);

        // // cus 1
        // Image::create([
        //     'customer_id' => $cus1->id,
        //     'name' => 'anh1.jpg'
        // ]);

        // Image::create([
        //     'customer_id' => $cus1->id,
        //     'name' => 'anh2.jpg'
        // ]);

        // Image::create([
        //     'customer_id' => $cus1->id,
        //     'name' => 'anh3.jpg'
        // ]);


        // // customer 2

        // Image::create([
        //     'customer_id' => $cus2->id,
        //     'name' => 'anh1.jpg'
        // ]);

        // Image::create([
        //     'customer_id' => $cus2->id,
        //     'name' => 'anh2.jpg'
        // ]);

        // Image::create([
        //     'customer_id' => $cus2->id,
        //     'name' => 'anh3.jpg'
        // ]);

        // // cus 3
        // Image::create([
        //     'customer_id' => $cus3->id,
        //     'name' => 'anh1.jpg'
        // ]);

        // Image::create([
        //     'customer_id' => $cus3->id,
        //     'name' => 'anh2.jpg'
        // ]);

        // Image::create([
        //     'customer_id' => $cus3->id,
        //     'name' => 'anh3.jpg'
        // ]);
    }
}

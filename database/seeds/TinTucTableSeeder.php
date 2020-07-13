<?php

use Illuminate\Database\Seeder;

class TinTucTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TinTuc')->insert([
            ['idLoaiTin' => '1', 'TieuDe' => 'Đầu xe container cháy ngùn ngụt', 'created_at' => new DateTime(), 'TieuDeKhongDau' => 'Dau-xe-container-chay-ngun-ngut', 'TomTat' => 'TP HCM - Phát hiện lửa bốc lên khi xe đang chạy trên Xa lộ Hà Nội, tài xế nhanh trí tách thùng container ra khỏi đầu kéo để cứu hàng.', 'NoiDung' => 'Trưa 24/6, tài xế Hoàng Văn Dũng (31 tuổi) lái xe container chở keo nhựa và màng co từ cảng Cát Lái đi Bình Dương. Khi cách cổng Khu công nghệ cao quận 9 khoảng 200 m, anh Dũng phát hiện đầu xe bốc cháy.', 'Hinh' => '1.jpg', 'NoiBat' => 1],
        ]);
    }
}

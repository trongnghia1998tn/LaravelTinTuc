<?php

use Illuminate\Database\Seeder;

class TheLoaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('TheLoai')->insert([
        	['Ten' => 'Thời sự','TenKhongDau' => 'Thoi-su'],
        	['Ten' => 'Thế giới','TenKhongDau' => 'The-gioi'],
        	['Ten' => 'Kinh doanh','TenKhongDau' => 'Kinh-doanh'],
        	['Ten' => 'Giải trí','TenKhongDau' => 'Giai-tri'],
        	['Ten' => 'Thể thao','TenKhongDau' => 'The-thao'],
        	['Ten' => 'Pháp luật','TenKhongDau' => 'Phap-luat'],
        	['Ten' => 'Giáo dục','TenKhongDau' => 'Giao-duc'],
        	['Ten' => 'Sức khỏe','TenKhongDau' => 'Suc-khoe'],
            ['Ten' => 'Đời sống','TenKhongDau' => 'Doi-song'],
        	['Ten' => 'Du lịch','TenKhongDau' => 'Du-lich'],
        	['Ten' => 'Khoa học','TenKhongDau' => 'Khoa-hoc'],
        	['Ten' => 'Số hóa','TenKhongDau' => 'So-hoa'],
        	['Ten' => 'Xe','TenKhongDau' => 'Xe']
    	]);
    }
}

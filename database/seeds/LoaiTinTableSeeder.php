<?php

use Illuminate\Database\Seeder;

class LoaiTinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('LoaiTin')->insert([
        	['idTheLoai'=>'1','Ten' => 'Giao thông','TenKhongDau' => 'Giao-thong'],
        	['idTheLoai'=>'1','Ten' => 'Mekong','TenKhongDau' => 'Mekong'],
        	['idTheLoai'=>'1','Ten' => 'Nông nghiệp sạch','TenKhongDau' => 'Nong-nghiep-sach'],
			['idTheLoai'=>'1','Ten' => 'Tuyến đầu chống dịch','TenKhongDau' => 'Tuyen-dau-chong-dich'],
			
			['idTheLoai'=>'2','Ten' => 'Tư liệu','TenKhongDau' => 'Tu-lieu'],
			['idTheLoai'=>'2','Ten' => 'Phân tích','TenKhongDau' => 'Phan-tich'],
        	['idTheLoai'=>'2','Ten' => 'Người Việt 5 châu','TenKhongDau' => 'Nguoi-Viet-5-chau'],
        	['idTheLoai'=>'2','Ten' => 'Cuộc sống đó đây','TenKhongDau' => 'Cuoc-song-do-day'],
        	['idTheLoai'=>'2','Ten' => 'Quân sự','TenKhongDau' => 'Quan-su'],
			
			['idTheLoai'=>'3','Ten' => 'Doanh nghiệp','TenKhongDau' => 'Doanh-nghiep'],
        	['idTheLoai'=>'3','Ten' => 'Bất động sản','TenKhongDau' => 'Bat-dong-san'],
        	['idTheLoai'=>'3','Ten' => 'Ebank','TenKhongDau' => 'Ebank'],
        	['idTheLoai'=>'3','Ten' => 'Thương mại điện tử','TenKhongDau' => 'Thuong-mai-dien-tu'],
        	['idTheLoai'=>'3','Ten' => 'Hàng hóa','TenKhongDau' => 'Hang-hoa'],
        	['idTheLoai'=>'3','Ten' => 'Chứng Khoán','TenKhongDau' => 'Chung-khoan'],
        	['idTheLoai'=>'3','Ten' => 'Quốc Tế','TenKhongDau' => 'Quoc-te'],
			

        	['idTheLoai'=>'4','Ten' => 'Giới sao','TenKhongDau' => 'Gioi-sao'],
        	['idTheLoai'=>'4','Ten' => 'Phim','TenKhongDau' => 'Phim'],
        	['idTheLoai'=>'4','Ten' => 'Nhạc','TenKhongDau' => 'Nhac'],
        	['idTheLoai'=>'4','Ten' => 'Thời trang','TenKhongDau' => 'Thoi-trang'],
        	['idTheLoai'=>'4','Ten' => 'Làm đẹp','TenKhongDau' => 'Lam-dep'],
        	['idTheLoai'=>'4','Ten' => 'Sách','TenKhongDau' => 'Sach'],
			['idTheLoai'=>'4','Ten' => 'Sân khấu - Mỹ thuật','TenKhongDau' => 'San-khau-my-thuat'],
			

        	['idTheLoai'=>'5','Ten' => 'Bóng Đá','TenKhongDau' => 'Bong-da'],
			['idTheLoai'=>'5','Ten' => 'Tennis','TenKhongDau' => 'Tennis'],
			
        	['idTheLoai'=>'6','Ten' => 'Hồ sơ phá án','TenKhongDau' => 'Ho-so-pha-an'],
			['idTheLoai'=>'6','Ten' => 'Tư vấn','TenKhongDau' => 'Tu-van'],
			
        	['idTheLoai'=>'7','Ten' => 'Tuyển sinh','TenKhongDau' => 'Tuyen-sinh'],
        	['idTheLoai'=>'7','Ten' => 'Học tiếng Anh','TenKhongDau' => 'Hoc-tieng-Anh'],
        	['idTheLoai'=>'7','Ten' => 'Du học','TenKhongDau' => 'Du-hoc'],
        	['idTheLoai'=>'7','Ten' => 'Giáo dục 4.0','TenKhongDau' => 'Giao-duc-4-0'],

        	['idTheLoai'=>'8','Ten' => 'Tin tức','TenKhongDau' => 'Tin-tuc'],
        	['idTheLoai'=>'8','Ten' => 'Các bệnh','TenKhongDau' => 'Cac-benh'],
        	['idTheLoai'=>'8','Ten' => 'Khỏe đẹp','TenKhongDau' => 'Khoe-dep'],
        	['idTheLoai'=>'8','Ten' => 'Dinh dưỡng','TenKhongDau' => 'Dinh-duong'],
        	['idTheLoai'=>'8','Ten' => 'Ung thư','TenKhongDau' => 'Ung-thu'],
        	['idTheLoai'=>'8','Ten' => 'Vaccine','TenKhongDau' => 'Vaccine'],

        	['idTheLoai'=>'9','Ten' => 'Tổ ấm','TenKhongDau' => 'To-am'],
        	['idTheLoai'=>'9','Ten' => 'Bài học sống','TenKhongDau' => 'Bai-hoc-song'],
        	['idTheLoai'=>'9','Ten' => 'Nhà','TenKhongDau' => 'Nha'],
			['idTheLoai'=>'9','Ten' => 'Tiêu dùng','TenKhongDau' => 'Tieu-dung'],
			
        	['idTheLoai'=>'10','Ten' => 'Điểm đến','TenKhongDau' => 'Diem-den'],
        	['idTheLoai'=>'10','Ten' => 'Dấu chân','TenKhongDau' => 'Dau-chan'],
        	['idTheLoai'=>'10','Ten' => 'Tư vấn','TenKhongDau' => 'Tu-van'],
        	['idTheLoai'=>'10','Ten' => 'Ảnh','TenKhongDau' => 'Anh'],
        	['idTheLoai'=>'10','Ten' => 'Cẩm nang','TenKhongDau' => 'Cam-nang'],

        	['idTheLoai'=>'11','Ten' => 'Trong nước','TenKhongDau' => 'Trong-nuoc'],
        	['idTheLoai'=>'11','Ten' => 'Thường thức','TenKhongDau' => 'Thuong-thuc'],
        	['idTheLoai'=>'11','Ten' => 'Thế giới động vật','TenKhongDau' => 'The-gioi-dong-vat'],
			['idTheLoai'=>'11','Ten' => 'Chuyện lạ','TenKhongDau' => 'Chuyen-la'],
			['idTheLoai'=>'11','Ten' => 'Hỏi - Đáp','TenKhongDau' => 'Hoi-dap'],

			['idTheLoai'=>'12','Ten' => 'Công nghệ','TenKhongDau' => 'Cong-nghe'],
			['idTheLoai'=>'12','Ten' => 'Sản phẩm','TenKhongDau' => 'San-pham'],
			['idTheLoai'=>'12','Ten' => 'Diễn đàn','TenKhongDau' => 'Dien-dan'],

			['idTheLoai'=>'13','Ten' => 'Tư vấn','TenKhongDau' => 'Tu-van'],
			['idTheLoai'=>'13','Ten' => 'Thị trường','TenKhongDau' => 'Thi-truong'],
			['idTheLoai'=>'13','Ten' => 'Diễn đàn','TenKhongDau' => 'Dien-dan'],
			['idTheLoai'=>'13','Ten' => 'Xe xanh','TenKhongDau' => 'Xe-xanh'],
			['idTheLoai'=>'13','Ten' => 'Đánh giá','TenKhongDau' => 'Danh-gia'],

    	]);
    }
}

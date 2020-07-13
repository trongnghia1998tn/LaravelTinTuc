<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\TheLoai;
use PhpParser\Node\Stmt\GroupUse;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dangnhap', 'UserController@getdangnhapAdmin');
Route::post('admin/dangnhap', 'UserController@postdangnhapAdmin');
Route::get('admin/dangxuat', 'UserController@getdangxuatAdmin');

Route::group(['prefix' => 'admin', 'middleware' => 'AdminLogin'], function () {

    // truy cập vào thể loại
    Route::group(['prefix' => 'theloai'], function () {
        // http://localhost/LaravelTinTuc/public/admin/theloai/danhsach;
        Route::get('danhsach', 'TheLoaiController@getDanhSach');

        // admin/theloai/sua;
        Route::get('sua/{id}', 'TheLoaiController@getSua');
        Route::post('sua/{id}', 'TheLoaiController@postSua');

        // admin/theloai/them;
        Route::get('them', 'TheLoaiController@getThem');
        Route::post('them', 'TheLoaiController@postThem');

        Route::get('xoa/{id}', 'TheLoaiController@getXoa');
    });


    // truy cập vào loại tin
    Route::group(['prefix' => 'loaitin'], function () {
        // http://localhost/LaravelTinTuc/public/admin/theloai/danhsach;
        Route::get('danhsach', 'LoaiTinController@getDanhSach');

        // admin/theloai/sua;
        Route::get('sua/{id}', 'LoaiTinController@getSua');
        Route::post('sua/{id}', 'LoaiTinController@postSua');

        // admin/theloai/them;
        Route::get('them', 'LoaiTinController@getThem');
        Route::post('them', 'LoaiTinController@postThem');

        Route::get('xoa/{id}', 'LoaiTinController@getXoa');
    });

    // truy cập vào tin tức
    Route::group(['prefix' => 'tintuc'], function () {
        // admin/tintuc/danhsach;
        Route::get('danhsach', 'TinTucController@getDanhSach');

        // admin/tintuc/sua;
        Route::get('sua/{id}', 'TinTucController@getSua');
        Route::post('sua/{id}', 'TinTucController@postSua');

        // admin/tintuc/danhsach;
        Route::get('them', 'TinTucController@getThem');
        Route::post('them', 'TinTucController@postThem');

        Route::get('xoa/{id}', 'TinTucController@getXoa');
    });

    Route::group(['prefix' => 'comment'], function () {

        Route::get('xoa/{id}/{idTinTuc}', 'CommentController@getXoa');
    });

    Route::group(['prefix' => 'ajax'], function () {
        Route::get('loaitin/{idTheLoai}', 'AjaxController@getLoaiTin');
    });


    Route::group(['prefix' => 'user'], function () {
        // admin/user/danhsach;
        Route::get('danhsach', 'UserController@getDanhSach');

        // admin/user/sua;
        Route::get('sua/{id}', 'UserController@getSua');
        Route::post('sua/{id}', 'UserController@postSua');

        // admin/user/danhsach;
        Route::get('them', 'UserController@getThem');
        Route::post('them', 'UserController@postThem');

        Route::get('xoa/{id}', 'UserController@getXoa');
    });
});


Route::get('trangchu', 'PagesController@trangchu');
Route::get('lienhe', 'PagesController@lienhe');
Route::get('loaitin/{id}/{TenKhongDau}.html', 'PagesController@loaitin');
Route::get('tintuc/{id}/{TieuDeKhongDau}.html', 'PagesController@tintuc');
Route::get('dangnhap','PagesController@getDangnhap');
Route::post('dangnhap','PagesController@postDangnhap');
Route::get('dangxuat','PagesController@getDangxuat');
Route::post('comment/{id}','CommentController@postComment');
Route::get('nguoidung','PagesController@getNguoidung');
Route::post('nguoidung','PagesController@postNguoidung');
Route::get('dangky','PagesController@getDangky');
Route::post('dangky','PagesController@postDangky');

Route::get('timkiem','PagesController@getTimKiem');

Route::get('theloai/{id}/{TenKhongDau}.html','PagesController@theloai');
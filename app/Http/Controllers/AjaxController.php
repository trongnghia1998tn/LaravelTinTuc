<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;

class AjaxController extends Controller
{
    //
    public function getLoaiTin($idTheLoai)
    {
        $loaitin = LoaiTin::where('idTheLoai',$idTheLoai)->get();
        foreach ($loaitin as $item)
        {
            echo "<option value='".$item->id."'>".$item->Ten."</option>";
        }
    }
}

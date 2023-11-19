<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Phieunhapxuat;
use App\Models\Sanpham;
use App\Models\CTnhapxuat;
use App\Models\Tonkho;
use App\Models\User;
use App\Models\Nhansu;

class dashboard extends Controller
{
    public function index(){   // Giao diện hiển thị toàn bộ dữ liệu: GET

        $idnhanvien = Auth::id();

        $nhanvien =  Nhansu::firstWhere('MANV', $idnhanvien);

        $makho = $nhanvien->MAKHO;

        $data_Cot = array(
            array("x"=> 10, "y"=> 41),
            array("x"=> 20, "y"=> 35, "indexLabel"=> "Lowest"),
            array("x"=> 30, "y"=> 50),
            array("x"=> 40, "y"=> 45),
            array("x"=> 50, "y"=> 52),
            array("x"=> 60, "y"=> 68),
            array("x"=> 70, "y"=> 38),
            array("x"=> 80, "y"=> 71, "indexLabel"=> "Highest"),
            array("x"=> 90, "y"=> 52),
            array("x"=> 100, "y"=> 60),
            array("x"=> 110, "y"=> 36),
            array("x"=> 120, "y"=> 49),
            array("x"=> 130, "y"=> 41)
        );

        return view("giaodien.app", [
            'page' => "dashboard",
            'data_BD_Cot' => $data_Cot
        ]);
    }

    public function Detail_SP($id){   // Xóa bỏ một dữ liệu: GET
        
        $idnhanvien = Auth::id();

        $nhanvien =  Nhansu::firstWhere('MANV', $idnhanvien);

        $makho = $nhanvien->MAKHO;


        return view("giaodien.app", [
            'page' => "dashboard"
        ]);
        
    }
}

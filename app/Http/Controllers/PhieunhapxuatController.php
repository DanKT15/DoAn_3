<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;

use App\Models\Phieunhapxuat;
use App\Models\Sanpham;
use App\Models\CTnhapxuat;
use App\Models\Nhansu;
use App\Models\DCnhapxuat;
use App\Models\Trangthai;
use App\Models\Kho;


class PhieunhapxuatController extends Controller
{
    public function index(){   // Giao diện hiển thị toàn bộ dữ liệu: GET
        return view("giaodien.app", ['page' => "phieunhapxuat.DSphieu"]);
    }

    public function create(){   // Giao diện thêm dữ liệu: GET
        $DCnhapxuat = DCnhapxuat::all();
        $Trangthai = Trangthai::all();
        return view("giaodien.app", 
        [
            'page' => "phieunhapxuat.ViewAddPhieu",
            'DCnhapxuat' => $DCnhapxuat,
            'Trangthai' => $Trangthai
        ]);
    }

    public function store(Request $request){   // Lưu trữ dữ liệu mới: POST
        
        $rules = [
            'sophieu' => 'required|alpha|max:20',
            'madiachi' => 'required|numeric',
            'matrangthai' => 'required|numeric',
            'soluong' => 'required|numeric',
            'masp.*.subject' => 'required|numeric|distinct:strict'
        ];

        $mess = [
            'sophieu.required' => 'Chưa nhập thông tin',
            'sophieu.alpha' => 'Vui lòng nhập ký tự chữ cái',
            'sophieu.max' => 'Tối đa 20 kí tự',
            'madiachi.required' => 'Chưa chọn thông tin',
            'matrangthai.required' => 'Chưa chọn thông tin',
            'masp.*.subject.required' => 'Chưa chọn thông tin',
            'masp.*.subject.distinct' => 'Không được trùng lặp thông tin',
            'soluong.required' => 'Vui lòng nhập số lượng',
            'soluong.numeric' => 'Vui lòng nhập chữ số',
        ];

        $request->validate($rules, $mess);

        $sophieu = $request->sophieu;

        $idnhanvien = Auth::id();

        $nhanvien =  Nhansu::firstWhere('MANV', $idnhanvien);

        $kho = Kho::find($nhanvien->MAKHO);

        // SELECT p.SOPHIEU, u.TENNV, n.QUANTRI, k.TENKHO
        // FROM phieunhapxuat p, users u, nhansu n, kho k
        // WHERE p.SOPHIEU LIKE 'ADGSG-1118'
        // AND p.MANV = u.MANV
        // AND n.MANV = u.MANV
        // AND n.MAKHO = k.MAKHO

        try {

            $idphieu = Phieunhapxuat::insertGetId([
                'SOPHIEU' => $request->sophieu,
                'MANV' => $idnhanvien,
                'MADC' => $request->madiachi,
                'MATT' => $request->matrangthai
            ]);
    
            Phieunhapxuat::where('id', $idphieu)->update(['SOPHIEU' => strtoupper($sophieu).'-'.$idphieu]);

            return back()->with('alert', 'Thêm dữ liệu thành công');

        } catch (Exception $err) {
            return back()->withError($err->getMessage())->withInput();
        }
        
    }

    public function show($id){   // Lấy chi tiết của một dữ liệu: GET
        
    }

    public function edit($id){   // Giao diện cập nhật dữ liệu: GET
        
    }

    public function update(Request $request, $id){   // Cập nhật lại dữ liệu: POST
        
    }

    public function destroy($id){   // Xóa bỏ một dữ liệu: GET
        
    }
}

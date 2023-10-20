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
use App\Models\Tonkho;


class PhieunhapxuatController extends Controller
{
    public function index(){   // Giao diện hiển thị toàn bộ dữ liệu: GET
        return view("giaodien.app", ['page' => "phieunhapxuat.DSphieu"]);
    }

    public function create(){   // Giao diện thêm dữ liệu: GET

        $DCnhapxuat = DCnhapxuat::all();
        $Trangthai = Trangthai::all();
        $Sanpham = Sanpham::all();

        // SELECT p.SOPHIEU, u.TENNV, n.QUANTRI, k.TENKHO
        // FROM phieunhapxuat p, users u, nhansu n, kho k
        // WHERE p.SOPHIEU LIKE 'ADGSG-1118'
        // AND p.MANV = u.MANV
        // AND n.MANV = u.MANV
        // AND n.MAKHO = k.MAKHO

        return view("giaodien.app", 
        [
            'page' => "phieunhapxuat.ViewAddPhieu",
            'DCnhapxuat' => $DCnhapxuat,
            'Trangthai' => $Trangthai,
            'Sanpham' => $Sanpham
        ]);
    }

    public function store(Request $request){   // Lưu trữ dữ liệu mới: POST
        
        $rules = [
            'sophieu' => 'required|alpha|max:20',
            'madiachi' => 'required|numeric',
            'matrangthai' => 'required|numeric',
            'sp.*.slsp' => 'required|numeric',
            'sp.*.idsp' => 'required|numeric|distinct:strict'
        ];

        $mess = [
            'sophieu.required' => 'Chưa nhập thông tin',
            'sophieu.alpha' => 'Vui lòng nhập ký tự chữ cái',
            'sophieu.max' => 'Tối đa 20 kí tự',
            'madiachi.required' => 'Chưa chọn thông tin',
            'matrangthai.required' => 'Chưa chọn thông tin',
            'sp.*.idsp.required' => 'Chưa chọn thông tin',
            'sp.*.idsp.distinct' => 'Không được trùng lặp thông tin',
            'sp.*.slsp.required' => 'Vui lòng nhập số lượng',
            'sp.*.slsp.numeric' => 'Vui lòng nhập chữ số',
        ];

        $request->validate($rules, $mess);

        $sophieu = $request->sophieu;

        $idnhanvien = Auth::id();

        $nhanvien =  Nhansu::firstWhere('MANV', $idnhanvien);

        try {

            $idphieu = Phieunhapxuat::insertGetId([
                'SOPHIEU' => $request->sophieu,
                'MANV' => $idnhanvien,
                'MADC' => $request->madiachi,
                'MATT' => $request->matrangthai
            ]);
    
            Phieunhapxuat::where('id', $idphieu)->update(['SOPHIEU' => strtoupper($sophieu).'-'.$idphieu]);

            foreach ($request->sp as $key => $value) {

                $sl = $value['slsp'];
                $sp = Sanpham::find($value['idsp']);
                $gia = $sp->GIASP;
                $dongia = $gia * $sl;
                
                $CTnhapxuat = CTnhapxuat::create([
                    'SOLUONG' => $sl, 
                    'DONGIA' => $gia, 
                    'THANHTIEN' => $dongia, 
                    'MAPHIEU' => $idphieu, 
                    'MASP' => $value['idsp']
                ]);

            }

            $Trangthai = Trangthai::find($request->matrangthai);

            $makho = $nhanvien->MAKHO;

            switch ($Trangthai->TENTT) {

                case 'Xuất':
                    
                    foreach ($request->sp as $key => $value) {

                        $tonkho = Tonkho::where('MAKHO', $makho)
                        ->where('MASP', $value['idsp'])
                        ->first();

                        if ($tonkho->SLTONKHO < $value['slsp'] || $value['slsp'] <= 0) {

                            $sp = Sanpham::find($value['idsp']);

                            return back()->with('err', 'Hiện chỉ còn '.$tonkho->SLTONKHO.' sản phẩm '.$sp->TENSP);
                        }

                        Tonkho::where('MAKHO', $makho)
                        ->where('MASP', $value['idsp'])
                        ->update([
                            'SLTONKHO' => $tonkho->SLTONKHO - $value['slsp'],
                            'SLXUAT' => $tonkho->SLXUAT + $value['slsp'],
                        ]);

                    }

                    break;
                
                default:
                    
                    foreach ($request->sp as $key => $value) {

                        $tonkho = Tonkho::where('MAKHO', $makho)
                        ->where('MASP', $value['idsp'])
                        ->first();

                        Tonkho::where('MAKHO', $makho)
                        ->where('MASP', $value['idsp'])
                        ->update([
                            'SLTONKHO' => $tonkho->SLTONKHO + $value['slsp'],
                            'SLNHAP' => $tonkho->SLNHAP + $value['slsp'],
                        ]);

                    }

                    break;
            }

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

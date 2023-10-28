<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\Sanpham;
use App\Models\Loaisp;
use App\Models\Nhacungcap;

class SanphamController extends Controller
{
    public function index(){   // Giao diện hiển thị toàn bộ dữ liệu: GET

        $sanpham = Sanpham::all();
        $Loaisp = Loaisp::all();
        $Nhacungcap = Nhacungcap::all();

        return view("giaodien.app", [
            'page' => "sanpham.DSsanpham",
            "sanpham"=> $sanpham,
            "Loaisp"=> $Loaisp,
            "Nhacungcap"=> $Nhacungcap
        ]);
    }

    public function create(){   // Giao diện thêm dữ liệu: GET

        $sanpham = Sanpham::all();
        $Loaisp = Loaisp::all();
        $Nhacungcap = Nhacungcap::all();

        return view("giaodien.app", [
            'page' => "sanpham.ViewAddSanpham",
            "sanpham"=> $sanpham,
            "Loaisp"=> $Loaisp,
            "Nhacungcap"=> $Nhacungcap
        ]);
    }

    public function store(Request $request){   // Lưu trữ dữ liệu mới: POST
        $rules = [
            'TENSP' => 'required|regex:/[[:alpha:]]\s/',
            'MALOAI' => 'required|numeric',
            'MANCC' => 'required|numeric',
            'THONGTIN' => 'required|regex:/[[:alpha:]]\s/',
            'GIASP' => 'required|numeric'
        ];

        $mess = [
            'TENSP.required' => 'Chưa nhập thông tin',
            'TENSP.regex' => 'Vui lòng nhập ký tự chữ cái',

            'MALOAI.required' => 'Chưa chọn thông tin',
            'MALOAI.numeric' => 'Vui lòng nhập chữ số',

            'MANCC.required' => 'Chưa chọn thông tin',
            'MANCC.numeric' => 'Vui lòng nhập chữ số',

            'THONGTIN.required' => 'Chưa nhập thông tin',
            'THONGTIN.regex' => 'Vui lòng nhập ký tự chữ cái',

            'GIASP.required' => 'Vui lòng nhập giá',
            'GIASP.numeric' => 'Vui lòng nhập chữ số'
        ];

        $request->validate($rules, $mess);

        try {
            
            Sanpham::create([
                'TENSP' => $request->TENSP,
                'MALOAI' => $request->MALOAI,
                'MANCC' => $request->MANCC,
                'THONGTIN' => $request->THONGTIN,
                'GIASP' => $request->GIASP
            ]);

            return back()->with('alert', 'Tạo sản phẩm thành công');

        } catch (Exception $err) {
            return back()->with('err', 'Lỗi: '.$err->getMessage());
        }
    }

    public function edit($id){   // Giao diện cập nhật dữ liệu: GET

        $sanpham = Sanpham::find($id);
        $Loaisp = Loaisp::all();
        $Nhacungcap = Nhacungcap::all();

        return view("giaodien.app", [
            'page' => "sanpham.ViewUpdataSanpham",
            "sanpham"=> $sanpham,
            "Loaisp"=> $Loaisp,
            "Nhacungcap"=> $Nhacungcap
        ]);
    }

    public function update(Request $request){   // Cập nhật lại dữ liệu: POST
        $rules = [
            'MASP' => 'required|numeric',
            'TENSP' => 'required|regex:/[[:alpha:]]\s/',
            'MALOAI' => 'required|numeric',
            'MANCC' => 'required|numeric',
            'THONGTIN' => 'required|regex:/[[:alpha:]]\s/',
            'GIASP' => 'required|numeric'
        ];

        $mess = [
            'MASP.required' => 'Chưa có id thông tin',

            'TENSP.required' => 'Chưa nhập thông tin',
            'TENSP.regex' => 'Vui lòng nhập ký tự chữ cái',

            'MALOAI.required' => 'Chưa chọn thông tin',
            'MALOAI.numeric' => 'Vui lòng nhập chữ số',

            'MANCC.required' => 'Chưa chọn thông tin',
            'MANCC.numeric' => 'Vui lòng nhập chữ số',

            'THONGTIN.required' => 'Chưa nhập thông tin',
            'THONGTIN.regex' => 'Vui lòng nhập ký tự chữ cái',

            'GIASP.required' => 'Vui lòng nhập giá',
            'GIASP.numeric' => 'Vui lòng nhập chữ số'
        ];

        $request->validate($rules, $mess);

        try {

            Sanpham::where('MASP', $request->MASP)
            ->update([
                'TENSP' => $request->TENSP,
                'MALOAI' => $request->MALOAI,
                'MANCC' => $request->MANCC,
                'THONGTIN' => $request->THONGTIN,
                'GIASP' => $request->GIASP
            ]);

            return back()->with('alert', 'Cập nhật sản phẩm thành công');

        } catch (Exception $err) {
            return back()->with('err', 'Lỗi: '.$err->getMessage());
        }
    }

    public function destroy(Request $request){   // Xóa bỏ một dữ liệu: GET
        $rules = [
            'MASP' => 'required|numeric'
        ];

        $mess = [
            'MASP.required' => 'Chưa có id thông tin'
        ];

        $request->validate($rules, $mess);

        $sanpham = Sanpham::find($request->MASP);

        if($sanpham){
            $sanpham->delete();
            return back()->with('alert', 'Xóa thành công');
        }

        return back()->with('err', 'Không tồn tại dữ liệu cần xóa');
    }
}

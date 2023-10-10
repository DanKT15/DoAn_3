<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\Phieunhapxuat;
use App\Models\Sanpham;
use App\Models\CTnhapxuat;

class PhieunhapxuatController extends Controller
{
    public function index(){   // Giao diện hiển thị toàn bộ dữ liệu: GET
        
    }

    public function create(){   // Giao diện thêm dữ liệu: GET
        // return view("giaodien.app", ['page' => "phieunhapxuat.ViewAddPhieu"]);
        return view("giaodien.phieunhapxuat.ViewAddPhieu");
    }

    public function store(Request $request){   // Lưu trữ dữ liệu mới: POST
        
        try {
            
            $request->validate([
                'sophieu' => ['required', 'string', 'max:255']
            ]);
    
            $idPhieu = Phieunhapxuat::insertGetId([
                'SOPHIEU' => $request->sophieu
            ]);
    
            Phieunhapxuat::where('id', $idPhieu)->update(['SOPHIEU' => 'KHO-'.$idPhieu]);

            

    
            return back()->with('alert', 'Thêm dữ liệu thành công');

        } catch (Exception $err) {
            return back()->withError($err->getMessage())->withInput();
        }
        
    }

    public function show($id){   // Lấy chi tiết của một dữ liệu: GET
        
    }

    public function edit($id){   // Giao diện cập nhật dữ liệu: GET
        
    }

    public function update(Request $request){   // Cập nhật lại dữ liệu: POST
        
    }

    public function destroy($id){   // Xóa bỏ một dữ liệu: GET
        
    }
}

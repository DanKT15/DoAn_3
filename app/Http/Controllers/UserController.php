<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index(){   // Giao diện hiển thị toàn bộ dữ liệu: GET
        
    }

    public function create(){   // Giao diện thêm dữ liệu: GET
        
    }

    public function store(Request $request){   // Lưu trữ dữ liệu mới: POST
        
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
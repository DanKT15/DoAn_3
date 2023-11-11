<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboard extends Controller
{
    public function index(){   // Giao diện hiển thị toàn bộ dữ liệu: GET
        return view("giaodien.app", [
            'page' => "dashboard",
        ]);
    }
}

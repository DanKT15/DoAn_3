<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Phieunhapxuat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhieunhanxuatController extends Controller
{
    public function Store(){

        $Userid = Phieunhapxuat::insertGetId([
            'SOPHIEU' => 'Janvi Singh'
         ]);

        Phieunhapxuat::where('id', $Userid)->update(['SOPHIEU' => 'KHO-'.$Userid]);
       
    }
}

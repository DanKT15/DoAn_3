<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phieunhapxuat extends Model
{
    use HasFactory;

    protected $table = 'phieunhapxuat';

    protected $primaryKey = 'SOPHIEU';

    protected $dateFormat = 'd-m-Y';

    // protected $fillable = ['column1','column2',..,'columnn'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTnhapxuat extends Model
{
    use HasFactory;

    protected $table = 'ct_nhapxuat';

    protected $primaryKey = 'id';

    protected $dateFormat = 'd-m-Y';

    // protected $fillable = ['column1','column2',..,'columnn'];
}

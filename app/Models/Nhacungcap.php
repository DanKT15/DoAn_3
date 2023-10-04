<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhacungcap extends Model
{
    use HasFactory;

    protected $table = 'nhacungcap';

    protected $primaryKey = 'MANCC';

    protected $dateFormat = 'd-m-Y';

    // protected $fillable = ['column1','column2',..,'columnn'];
}

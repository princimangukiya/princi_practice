<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class d_purchase extends Model
{
    
    protected $table = "d_purchase";
    protected $primaryKey = "d_id";
    protected $fillable=['d_barcode', 'd_wt', 'd_col', 'd_pc', 'd_shape', 'd_cla','d_exp_pr','d_exp'];
}

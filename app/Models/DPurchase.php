<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DPurchase extends Model
{
    use SoftDeletes;
    protected $table = "d_purchase";
    protected $primaryKey = "d_id";
    protected $fillable = ['d_barcode', 'd_wt', 'd_col', 'd_pc', 'shape_id', 'd_cla', 'd_exp_pr', 'd_exp'];


    public function shapeDate()
    {
        return $this->belongsTo('App\Models\DiamondShape', 'shape_id');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Models\SupplierDetails', 's_id');
    }
}

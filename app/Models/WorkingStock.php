<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkingStock extends Model
{
    use SoftDeletes;
    protected $table = "working_stock";
    protected $primaryKey = "w_id";
    protected $fillable = ['m_id', 'd_id', 'd_barcode'];
    public function Manager()
    {
        return $this->belongsTo('App\Models\ManagerDetails', 'm_id');
    }

    public function Diamond()
    {
        return $this->belongsTo('App\Models\DPurchase', 'd_id');
    }
}
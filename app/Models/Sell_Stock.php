<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sell_Stock extends Model
{

    use SoftDeletes;
    protected $table = "sell_stock";
    protected $primaryKey = "sell_id";
    protected $fillable = ['s_id', 'd_id', 'c_id', 'return_date'];
    public function Supplier()
    {
        return $this->belongsTo('App\Models\supplier_details', 's_id');
    }

    public function Diamond()
    {
        return $this->belongsTo('App\Models\D_Purchase', 'd_id');
    }
}
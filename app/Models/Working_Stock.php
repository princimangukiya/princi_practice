<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Working_Stock extends Model
{
    protected $table = "working_stock";
    protected $primaryKey = "w_id";
    protected $fillable=['m_id', 'd_id', 'd_barcode'];

    public function Manager()
    {
        return $this->belongsTo('App\Models\Manager_Details', 'm_id');
    }

    public function Diamond()
    {
        return $this->belongsTo('App\Models\D_Purchase', 'd_id');
    }
}

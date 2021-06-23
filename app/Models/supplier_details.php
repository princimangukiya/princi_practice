<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier_details extends Model
{
    protected $table = "supplier_details";
    protected $primaryKey = "s_id";
    protected $fillable=['s_name', 's_address', 's_gst'];
}

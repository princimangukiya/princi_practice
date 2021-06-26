<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manager_details extends Model
{
    protected $primaryKey = "m_id";
    protected $fillable = ['m_name', 'm_address', 'm_phone', 'm_email'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manager_Details extends Model
{
    use SoftDeletes;
    protected $table = "manager_details";
    protected $primaryKey = "m_id";
    protected $fillable = ['m_name', 'm_address', 'm_phone', 'm_email'];
}
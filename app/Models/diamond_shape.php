<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diamond_shape extends Model
{
    protected $table = "diamond_shape";
    protected $primaryKey = "shape_id";
    protected $fillable = ['shape_name'];
}

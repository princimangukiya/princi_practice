<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RateMaster extends Model
{
    use HasFactory;
    protected $table = "rate_masters";
    protected $primaryKey = "Rate_id";
    protected $fillable = ['Rate', 'Price'];
}

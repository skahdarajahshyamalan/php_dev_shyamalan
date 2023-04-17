<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accura_Member extends Model
{
    use HasFactory;
    protected $fillable = ['FirstName', 'LastName','Date','Division','Summery'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;

    protected $table = 'centers';
    protected $fillable = ['description', 'email', 'contact_email', 'phone_1', 'phone_2', 'lat', 'lng', 'logo'];
}

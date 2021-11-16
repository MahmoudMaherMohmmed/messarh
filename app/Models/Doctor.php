<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Translatable;

class Doctor extends Model
{
    use Translatable, HasFactory;

    protected $table = 'doctors';
    protected $fillable = ['name', 'image', 'subspecialty', 'graduation_university'];

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }
}

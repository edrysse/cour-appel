<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenceDemande extends Model
{
    use HasFactory;

    protected $fillable = [
        "employe_name",
        "work_type",
        "rental",
        "duree",
        'status',
        "leave_date"
    ];
}

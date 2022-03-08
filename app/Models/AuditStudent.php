<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditStudent extends Model
{
    use HasFactory;

    protected $table = 'auditStudent';
    protected  $fillable = [
        'previusName',
        'newName',
        'previusProgram',
        'newProgram',
        'process',
    ];

    protected $hidden =[
        'created_at',
        'updated_at',
    ];
}

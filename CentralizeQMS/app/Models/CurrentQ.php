<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentQ extends Model
{
    use HasFactory;
    public $table = 'currentqueue';
    protected $fillable = [
        'QType',
        'QName',
        'TotalQueue',
        'SkippedQueue'
    ];
}

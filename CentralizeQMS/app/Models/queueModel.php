<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class queueModel extends Model
{
    use HasFactory;

    public $table = 'queueTable';
    protected $fillable = [
        'category',
        'skipped',
        'status',
        'wait_time'
    ];

    // protected $casts = [
    //     'wait_time' => 'datetime: i:s',
    // ];
}

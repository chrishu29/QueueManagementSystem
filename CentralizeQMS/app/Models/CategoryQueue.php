<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryQueue extends Model
{
    use HasFactory;
    public $table = 'categoryQueue';
    protected $fillable = [
        'catAlias',
        'catName'
    ];
}

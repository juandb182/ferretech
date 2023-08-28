<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ferre1 extends Model
{
    use HasFactory;


    protected $fillable = [
        'CODIGO',
        'PRODUCTO',
        'PRECIO',
        'EXISTENCIA'
    ];

    public $timestamps = false;

}

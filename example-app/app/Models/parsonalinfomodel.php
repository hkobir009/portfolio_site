<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parsonalinfomodel extends Model
{
    use HasFactory;
    protected $table='parsonalinfo';
    protected $primaryKey='id';
    public $incrementing=true;
    protected $keyType='int';
    public $timestamps=false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class choosemodel extends Model
{
    use HasFactory;
    protected $table='choose';
    protected $primaryKey='id';
    public $incrementing=true;
    protected $keyType='int';
    public $timestamps=false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class socialModel extends Model
{
    use HasFactory;
    protected $table='social';
    protected $primaryKey='id';
    public $incrementing= true;
    protected $keyType='int';
    public $timestamps= false;
}

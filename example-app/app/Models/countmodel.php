<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class countmodel extends Model
{
    use HasFactory;
    protected $table='count';
    protected $primaryKey='id';
    public $incrementing= true;
    protected $keyType='int';
    public $timestamps= false;
}

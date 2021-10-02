<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testimonialmodel extends Model
{
    use HasFactory;
    protected $table='testimonial';
    protected $primaryKey='id';
    public $incrementing= true;
    protected $keyType='int';
    public $timestamps= false;
}

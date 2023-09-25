<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Aluno extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'idade', 'email'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SentEmail extends Model
{
    use HasFactory;

    // Voeg de 'name' kolom toe aan de fillable array
    protected $fillable = ['name', 'email', 'message'];
}

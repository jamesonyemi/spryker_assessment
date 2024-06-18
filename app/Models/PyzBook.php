<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PyzBook extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'publication_date'];
}

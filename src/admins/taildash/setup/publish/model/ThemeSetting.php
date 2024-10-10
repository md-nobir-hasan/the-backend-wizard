<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeSetting extends Model
{
    use HasFactory;
    protected $fillable = ['layout', 'primary_color', 'color_scheme', 'sidebar_color', 'direction'];
}

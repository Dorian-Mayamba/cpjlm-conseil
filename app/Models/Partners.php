<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{
    use HasFactory;

    protected $fillable = ['partner_name', 'description', 'partner_email', 'partner_number', 'partner_website', 'logo'];
}

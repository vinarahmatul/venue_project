<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class birthday extends Model
{
    protected $table = 'birthdays';
    
    protected $primaryKey = 'id_party';
    
    protected $fillable = [
        'title_party',
        'party_photo',
        'description_party'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wedding extends Model
{
    protected $table = 'weddings';
    
    protected $primaryKey = 'id_wedding';
    
    protected $fillable = [
        'title_wedding',
        'wedding_photo',
        'description_wedding'
    ];
}

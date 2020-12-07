<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class webhook_store_data extends Model
{
    use HasFactory;
    
    protected $table = 'webhook_data_store';
    
    protected $casts = [
        'intent' => 'array',
        'parameters' => 'array'
    ];

    protected $fillable = ['intent', 'parameters'];

}

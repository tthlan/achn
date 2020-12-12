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

    /**
     * Get $limit as Top by Order By DESC Update
     *
     * @param int limit
     */
    public static function getTop($limit){
        return webhook_store_data::orderByDesc('updated_at')->take($limit)->get();
    }
}

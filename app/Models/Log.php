<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    
    protected $table = 'logs';
    
    public $timestamps = false;
    
    protected $casts = [
        'timestamp' => 'datetime'
    ];

    public function car() {
        return $this->belongsTo(Car::class);
    }
}

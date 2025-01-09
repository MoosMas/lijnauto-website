<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $table = 'logs';

    protected $fillable = ['car_id', 'level', 'message', 'timestamp'];

    /**
     * Available log levels
     */
    public const LEVELS = ['CHECKPOINT', 'INFO', 'WARNING', 'ERROR'];

    /**
     * Available colors for checkpoint logs
     */
    public const CHECKPOINT_COLORS = ['red', 'green', 'blue'];

    public $timestamps = false;

    protected $casts = [
        'timestamp' => 'datetime'
    ];

    /**
     * Get car associated with the log
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}

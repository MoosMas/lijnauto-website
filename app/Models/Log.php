<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
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

    /**
     * Get the logs with a specific level
     *
     * @param  Builder  $query
     * @param  string  $level The log level
     * @return Builder
     */
    public function scopeLevel(Builder $query, string $level)
    {
        return $query->where('level', $level);
    }

    /**
     * Get the logs from the last 24 hours
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeLast24Hours(Builder $query)
    {
        return $query->where('timestamp', '>=', Carbon::now()->subHours(24));
    }

    /**
     * Get the logs from the last week
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeLastWeek(Builder $query)
    {
        return $query->where('timestamp', '>=', Carbon::now()->subWeek());
    }
}

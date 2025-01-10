<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';
    protected $fillable = ['name', 'description'];

    /**
     * Get all logs associated with the car
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function logs()
    {
        return $this->hasMany(Log::class)->orderBy('timestamp', 'desc');
    }

    /**
     * Get the car's logs with a specific level
     *
     * @param  string  $level The log level
     * @return Builder
     */
    public function logLevel(string $level)
    {
        return $this->logs()->level($level);
    }

    /**
     * Get the car's logs from the last 24 hours
     *
     * @return Builder
     */
    public function logsLast24Hours()
    {
        return $this->logs()->last24Hours();
    }

    /**
     * Get the car's logs from the last week
     *
     * @return Builder
     */
    public function logsLastWeek()
    {
        return $this->logs()->lastWeek();
    }
}

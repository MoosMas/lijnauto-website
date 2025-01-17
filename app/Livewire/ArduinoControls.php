<?php

namespace App\Livewire;

use App\Models\Log;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class ArduinoControls extends Component
{
    protected $listeners = ['error' => 'createLog'];
    
    public function createLog($level, $message)
    {
        $log = Log::create([
            'car_id' => 1,
            'level' => $level,
            'message' => $message,
            'timestamp' => Carbon::now()->timestamp
        ]);
    }
    
    public function render()
    {
        return view('livewire.arduino-controls');
    }
}

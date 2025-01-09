<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Logs extends Component
{
    use WithPagination;
    
    public ?string $search = '';
    public ?string $level = '';
    public Car $car;

    public function mount(Car $car)
    {
        $this->car = $car;
    }

    public function filter($level)
    {
        $this->level = $level;
    }

    public function render()
    {
        $logs = $this->car->logs()
            ->when($this->search, function ($query) {
                $query->where('message', 'like', '%' . $this->search . '%');
            })->when($this->level, function ($query) {
                $query->where('level', 'like', '%' . $this->level . '%');
            })->paginate(10);
        
        return view('livewire.logs', [
            'logs' => $logs
        ]);
    }
}

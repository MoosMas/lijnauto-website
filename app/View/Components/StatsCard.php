<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatsCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        private string $color = 'light',
        public string  $level = 'INFO'
    ) {}

    /**
     * @return string
     */
    public function containerClasses()
    {
        $baseClasses = 'block max-w-sm p-6 border border-gray-200 rounded-lg shadow dark:border-gray-700 ';

        $colorClasses = match ($this->color) {
            'green' => 'bg-green-500 hover:bg-green-600 dark:bg-green-600 dark:hover:bg-green-700',
            'red' => 'bg-red-500 hover:bg-red-600 dark:bg-red-500 dark:hover:bg-red-600',
            'yellow' => 'bg-yellow-300 hover:bg-yellow-400 dark:bg-yellow-400 dark:hover:bg-yellow-500',
            'blue' => 'bg-blue-500 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700',
            'light' => 'text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700',
            default => 'text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700'
        };

        return $baseClasses . $colorClasses;
    }

    /**
     * @return string
     */
    public function headingClasses()
    {
        $baseClasses = 'mb-2 text-2xl font-bold tracking-tight ';

        $colorClasses = match ($this->color) {
            'light' => 'text-gray-900 dark:text-white',
            default => 'text-white'
        };

        return $baseClasses . $colorClasses;
    }

    /**
     * @return string
     */
    public function bodyClasses()
    {
        $baseClasses = 'text-right font-normal ';

        $colorClasses = match ($this->color) {
            'light' => 'text-gray-900 dark:text-white',
            default => 'text-white'
        };

        return $baseClasses . $colorClasses;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.stats-card');
    }
}

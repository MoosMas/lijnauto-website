<div>
    <i @class([
		'p-4 mb-4 text-xl rounded-lg',
		'bi bi-flag-fill text-gray-800 dark:text-gray-300' => $level == 'CHECKPOINT',
		'bi bi-info-circle-fill text-blue-800 dark:text-blue-400' => $level == 'INFO',
		'bi bi-exclamation-triangle-fill text-yellow-400 dark:text-yellow-300' => $level == 'WARNING',
        'bi bi-exclamation-circle-fill text-red-800 dark:text-red-400' => $level == 'ERROR',
])></i>
</div>
<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
			{{ $car->name }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
				<div class="p-6 text-gray-900 dark:text-gray-100">
					<div class="flex gap-24 justify-between basis-1/2">
						<div class="w-1/3 h-fit inline">
							<div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
								<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $car->name }}</h5>
								<p class="font-normal text-gray-700 dark:text-gray-400">{{ $car->description }}</p>

								@livewire('arduino-controls')
							</div>
							<div class="my-3">
								<h3 class="my-2 text-2xl font-bold dark:text-white">Logs in de afgelopen 24 uur</h3>
								<div class="grid gap-3 grid-cols-2">
									<x-stats-card color="light" level="CHECKPOINT">
										<x-slot:title>{{ $car->logLevel('CHECKPOINT')->last24Hours()->count() }}</x-slot:title>
										<x-slot:body>Checkpoints</x-slot:body>
									</x-stats-card>
									<x-stats-card color="blue" level="INFO">
										<x-slot:title>{{ $car->logLevel('INFO')->last24Hours()->count() }}</x-slot:title>
										<x-slot:body>Info</x-slot:body>
									</x-stats-card>
									<x-stats-card color="yellow" level="WARNING">
										<x-slot:title>{{ $car->logLevel('WARNING')->last24Hours()->count() }}</x-slot:title>
										<x-slot:body>Warnings</x-slot:body>
									</x-stats-card>
									<x-stats-card color="red" level="ERROR">
										<x-slot:title wire:poll>{{ $car->logLevel('ERROR')->Last24Hours()->count() }}</x-slot:title>
										<x-slot:body>Errors</x-slot:body>
									</x-stats-card>
								</div>
							</div>
						</div>

						@livewire('logs', ['car' => $car])
					</div>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>
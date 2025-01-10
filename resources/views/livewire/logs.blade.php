@php use Carbon\Carbon; @endphp
<div class="w-1/2 flex-grow relative">
	<div class="flex">
		<button id="levels-button" data-dropdown-toggle="dropdown-levels"
		        class="py-1 mb-3 z-10 inline-flex items-center py-2 px-4 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
		        type="button">
			<div id="selected-filter" class="inline-flex items-center">
				@if ($this->level)
					<x-status-icon :level="$this->level"/>
				@else
					<span class="text-xl">Geen filter</span>
				@endif
			</div>
		</button>
		<x-forms.select-dropdown :options="App\Models\Log::LEVELS"/>
		<input wire:model.live="search" placeholder="Zoeken..."
		       class="mb-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-e-lg focus:ring-blue-500 focus:border-blue-500 block flex-grow p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
	</div>
	<div class="overflow-x-auto shadow-md sm:rounded-lg">
		<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
			<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
				<tr>
					<th scope="col" class="px-6 py-3">
						Log level
					</th>
					<th scope="col" class="px-6 py-3">
						Bericht
					</th>
					<th scope="col" class="px-6 py-3">
						Tijd
					</th>
				</tr>
			</thead>
			<tbody>
				@foreach($logs as $log)
					<tr wire:key="{{ $log->id }}"
					    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
						<th scope="row"
						    class="px-6 py-4 text-xl font-medium text-gray-900 whitespace-nowrap dark:text-white">
							<x-status-icon :level="$log->level"></x-status-icon>
						</th>
						<td class="px-6 py-4">
							{{ $log->message }}
						</td>
						<td class="px-6 py-4">
							{{ Carbon::parse($log->timestamp)->format('d-m-Y H:i:s') }}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{{ $logs->links() }}
	</div>

	@script
	<script type="module">
		window.addEventListener( 'load', function () {
			let targetEl = document.getElementById( 'dropdown-levels' );

			const options = {
				triggerType: 'click',
			};

			let triggerEl = document.getElementById( 'levels-button' );
			const dropdown = new Dropdown( targetEl, triggerEl, options );

			Array.from( document.getElementsByClassName( 'dropdown-option' ) ).forEach( el => {
				el.addEventListener( 'click', ( e ) => {
					$wire.filter( el.getAttribute( 'data-value' ) );
					console.log( el.getAttribute( 'data-value' ) )
					dropdown.toggle();
					document.querySelector( '#selected-filter' ).innerHTML = el.innerHTML;
				} );
			} );
		} )
	</script>
	@endscript
</div>
<div id="dropdown-levels"
     class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-28 dark:bg-gray-700">
	<ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="levels-button">
		<x-forms.select-dropdown-option :data-value="null">
			Geen filter
		</x-forms.select-dropdown-option>

		@foreach($options as $item)
			<x-forms.select-dropdown-option wire:key="{{$item}}" :value="$item">
				<x-status-icon :level="$item"/>
			</x-forms.select-dropdown-option>
		@endforeach
	</ul>
</div>
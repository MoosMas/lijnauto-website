<li>
	<button data-value="{{$attributes->get('value')}}" type="button"
	        class="dropdown-option inline-flex w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
		<div class="inline-flex items-center">
			{{ $slot }}
		</div>
	</button>
</li>
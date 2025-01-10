@if($attributes->get('type'))
	<button {{ $attributes->merge(['class' => $classes]) }}>{{$slot}}</button>
@else
	<a {{ $attributes->merge(['class' => $classes]) }}>{{$slot}}</a>
@endif
<div>
	<div {{ $attributes->merge(['class' => $containerClasses]) }}>
		<div class="flex items-center justify-between text-3xl">
			<x-status-icon :level="$level"/>
			<h5 {{ $attributes->merge(['class' => $headingClasses]) }}>{{ $title }}</h5>
		</div>
		<p {{ $attributes->merge(['class' => $bodyClasses]) }}>{{ $body }}</p>
	</div>
</div>
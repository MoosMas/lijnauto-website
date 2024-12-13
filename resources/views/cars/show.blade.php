<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
			{{ $car->name }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 text-gray-900 dark:text-gray-100">
					<div class="flex justify-between basis-1/2">

						<div class="w-1/3 h-fit inline p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
							<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$car->name}}</h5>
							<p class="font-normal text-gray-700 dark:text-gray-400">{{$car->description}}</p>
						</div>
						
						<div class="w-1/2 flex-grow relative overflow-x-auto shadow-md sm:rounded-lg">
							<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
								<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
									<tr>
										<th scope="col" class="px-6 py-3">
											Kleur
										</th>
										<th scope="col" class="px-6 py-3">
											Tijd
										</th>
									</tr>
								</thead>
								<tbody>
									@foreach($car->logs as $log)
										<tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
											<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
												{{$log->checkpoint_color}}
											</th>
											<td class="px-6 py-4">
												{{\Carbon\Carbon::parse($log->timestamp)->format('d-m-Y H:i:s')}}
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>


					</div>
				</div>
			</div>
		</div>
	</div>

</x-app-layout>
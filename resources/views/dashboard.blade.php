<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Auto's") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex gap-16 items-center justify-between mb-5">
                        <x-flash-message/>
                        <x-forms.button href="{{route('cars.create')}}" class="ms-auto" color="default">Nieuwe auto</x-forms.button>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Naam
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Beschrijving
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cars as $car)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$car->name}}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$car->description}}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <x-forms.button href="{{route('cars.show', $car)}}">Bekijk</x-forms.button>
                                            <x-forms.button href="{{route('cars.edit', $car)}}">Bewerk</x-forms.button>
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
</x-app-layout>

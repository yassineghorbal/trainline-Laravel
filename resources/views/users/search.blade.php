<x-layout>
    <div class="flex flex-col items-center mb-10">
        <h1 class="text-3xl font-bold text-slate-800">
            Trainline
        </h1>
        <p class="text-slate-800">
            Available trips
        </p>
    </div>

    {{-- search results --}}
    <div class="flex flex-col">
        @unless(empty($trips))
            @foreach ($trips as $trip)
                <div class="text-center mb-5 mx-auto">
                    <a href="/trips/{{ $trip->id }}"
                        class="block p-6 bg-white rounded-lg border border-gray-200 hover:shadow-md">
                        <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-gray-900">
                            {{ $trip->start_city }}
                            &rarr; {{ $trip->end_city }}</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $trip->start_date }} &rarr;
                            {{ $trip->end_date }}</p>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Price: ${{ $trip->price }}</p>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Available seats: {{ $trip->seats }}</p>
                    </a>
                </div>
            @endforeach
        @else
            <p class="text-red-500 w-full text-center">No trips found!</p>
        @endunless

    </div>
</x-layout>

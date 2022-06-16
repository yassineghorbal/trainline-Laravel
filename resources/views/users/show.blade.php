<x-layout>
    <div class="flex flex-col items-center mb-10">
        <h1 class="text-3xl font-bold text-slate-800">
            Trainline
        </h1>
        <p class="text-slate-800">
            Get a ticket for your next train journey!
        </p>
    </div>

    {{-- search results --}}
    <div class="flex flex-col items-center md:flex-row">
        <div class="mx-auto text-center mb-5">
            <div class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:border-gray-700">
                <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                    {{ $trip->start_city }}
                    &rarr; {{ $trip->end_city }}</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">{{ $trip->start_date }} &rarr;
                    {{ $trip->end_date }}</p>
                <p class="font-normal text-gray-700 dark:text-gray-400">Price: ${{ $trip->price }}</p>
                <p class="font-normal text-gray-700 dark:text-gray-400">Available seats: {{ $trip->seats }}</p>
                <form action="/book" method="POST" class="mt-5">
                    @csrf
                    <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                    <button type="submit"
                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">book
                        a ticket</button>
                </form>
            </div>

        </div>

    </div>
</x-layout>

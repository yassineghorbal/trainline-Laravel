<x-layout>
    <div class="flex flex-col items-center mb-10">
        <h1 class="text-3xl font-bold text-slate-800">
            Trainline
        </h1>
        <p class="text-slate-800">
            Your tickets
        </p>
    </div>

    {{-- search results --}}
    <div class="w-full flex flex-col flex-wrap items-center justify-center md:flex-row">
        @unless($tickets->isEmpty())
            @foreach ($tickets as $ticket)
                <div class="mx-auto text-center mb-5 block">
                    <div
                        class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $ticket->start_city }}
                            &rarr; {{ $ticket->end_city }}</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $ticket->start_date }} &rarr;
                            {{ $ticket->end_date }}</p>
                        <p class="font-normal text-gray-700 dark:text-gray-400 mb-5">Price: ${{ $ticket->price }}</p>
                        <form action="/tickets/{{ $ticket->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            {{-- <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                            <input type="hidden" name="trip_id" value="{{ $ticket->trip_id }}"> --}}

                            <button type="submit"
                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 hover:bg-red-500 hover:text-white">Cancel
                                ticket</button>
                        </form>
                    </div>

                </div>
            @endforeach
        @else
            <p class="text-red-500 w-full text-center">No tickets found!</p>
        @endunless
</x-layout>

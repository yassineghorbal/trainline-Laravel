<x-layout>
    <div class="flex flex-col items-center my-12">
        <h1 class="text-3xl font-bold text-slate-800">
            Trainline
        </h1>
        <p class="text-slate-800">
            A simple ticketing system for the train industry.
        </p>
    </div>

    {{-- search --}}
    <div
        class="w-11/12 flex flex-col max-w-4xl mx-auto border border-gray-200 rounded p-3 shadow-2xl bg-gray-100  mb-32 md:flex-col hover:shadow-md">
        <form method="GET" action="trips/search">
            @csrf
            <div class="flex flex-col mb-2 gap-x-2 md:flex-row">
                <div class="flex flex-col md:w-1/2">
                    <label for="start_city" class="text-sm font-semibold">Start city</label>
                    <input type="text" name="start_city" id="name" class="border border-gray-200 p-2 w-full">
                </div>
                <div class="flex flex-col md:w-1/2">
                    <label for="end_city" class="text-sm font-semibold">Arrival city</label>
                    <input type="text" name="end_city" id="name" class="border border-gray-200 p-2 w-full">
                </div>
            </div>
            {{-- submit --}}
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Search
                </button>
            </div>
        </form>
    </div>


</x-layout>

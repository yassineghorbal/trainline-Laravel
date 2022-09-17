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
    <div class="w-11/12 p-10 mx-auto bg-gray-100 border border-gray-200 rounded hover:shadow-md">
        <form method="GET" action="trips/search">
            @csrf
            <div class="flex flex-col mb-10">
                <label for="city" class="font-semibold mb-2">Look for a city</label>
                <input type="text" name="start_city" id="name" class="border border-gray-200 p-2 w-full"
                    required>
            </div>

            {{-- submit --}}
            <div class="flex justify-start">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Search
                </button>
            </div>
        </form>
    </div>


</x-layout>

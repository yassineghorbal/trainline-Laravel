<x-layout_admin>
    <div class="bg-gray-50 shadow-2xl border border-gray-200 rounded p-10 mx-auto mt-24 max-w-lg">
        <h1 class="text-center text-3xl uppercase mb-2">Edit trip</h1>
        <form action="/trips/{{ $trip->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="start_city" class="inline-block text-lg mb-2">Start City</label>
                <input type="text" name="start_city" class="border border-gray-200 rounded p-2 w-full"
                    value="{{ $trip->start_city }}">
                @error('start_city')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="end_city" class="inline-block text-lg mb-2">Arrival City</label>
                <input type="text" name="end_city" class="border border-gray-200 rounded p-2 w-full"
                    value="{{ $trip->end_city }}">
                @error('end_city')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="start_date" class="inline-block text-lg mb-2">Start date</label>
                <input type="text" name="start_date" class="border border-gray-200 rounded p-2 w-full"
                    value="{{ $trip->start_date }}">
                @error('start_date')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="end_date" class="inline-block text-lg mb-2">Arrival date</label>
                <input type="text" name="end_date" class="border border-gray-200 rounded p-2 w-full"
                    value="{{ $trip->end_date }}">
                @error('end_date')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="price" class="inline-block text-lg mb-2">Price</label>
                <input type="text" name="price" class="border border-gray-200 rounded p-2 w-full"
                    value="{{ $trip->price }}">
                @error('price')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="seats" class="inline-block text-lg mb-2">Seats</label>
                <input type="text" name="seats" class="border border-gray-200 rounded p-2 w-full"
                    value="{{ $trip->seats }}">
                @error('seats')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <button type="submit"
                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Update
                    trip</button>

                <a href="/trips" class="text-black ml-4 hover:underline"> Back </a>
            </div>
        </form>
    </div>
</x-layout_admin>

<x-layout_admin>

    <div class="relative overflow-x-auto shadow-xl sm:rounded-lg">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Trips
            </h1>
        </header>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Start City
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Arrival City
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Start Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Arrival Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Seats
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @unless($trips->isEmpty())
                    @foreach ($trips as $trip)
                        <tr
                            class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $trip->start_city }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $trip->end_city }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $trip->start_date }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $trip->end_date }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $trip->price }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $trip->seats }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="/trips/{{ $trip->id }}/edit"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i
                                        class="fa-solid fa-pencil"></i>Edit</a>
                                <form action="/trips/{{ $trip->id }}" method="POST" class="inline-block">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"
                                        class="font-medium text-red-600 dark:text-red-500 ml-5 hover:underline"><i
                                            class="fa-solid fa-trash"></i>Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center">
                            No trips found.
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
    </div>

</x-layout_admin>

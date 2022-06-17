@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
        class="fixed text-center w-full top-1/4 left-1/2 transform -translate-x-1/2 bg-green-600 text-white px-2 py-3 rounded shadow-md md:w-3/5">
        <p>
            {{ session('message') }}
        </p>
    </div>
@endif

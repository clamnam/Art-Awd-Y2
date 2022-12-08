<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('patrons') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8 border border-green-200 text-green-700">

                <x-alert-success>
                    {{ session('success') }}
                </x-alert-success>
            </div>

            <div class="flex">

            </div>
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                    <h2 class=" font-bold text-4xl"> {{ $patron->name }}</h2>
                    <p class="mt-2">
                        {{ $patron->address }}
                        <br>
                </div>
                {{-- <div class="flex">
                    <a class="items-end btn-link" href="{{ route('user.patrons.edit', $patron) }}">Edit patron</a>

                    <form action="{{ route('user.patrons.destroy', $patron) }}" method="post">
                        @method('delete') --}}
                {{-- @csrf --}}
                {{-- Allows you to delete with an "are you sure?" prompt --}}
                {{-- <button type="submit" class="btn-link bg-red-600 ml-4"
                    onclick="return confirm('Are you sure you wish to delete this patron?')">Delete patron
                </button> --}}
                {{-- </form> --}}

                {{-- </div> --}}

            </div>
</x-app-layout>

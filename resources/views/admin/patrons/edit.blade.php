<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                {{-- form that takes in data and through store function in ArtController inserts the data into the database --}}
                {{-- enctype is a method of encrypting the form data --}}
                <form action="{{ route('admin.patrons.update', $patron) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <x-input type="text" field="name" name="name" placeholder="name" class="w-full"
                        autocomplete="off" :value="@old('name', $patron->name)"></x-input>

                    <x-input type="text" field="text" name="address" placeholder="address" class="w-full"
                        autocomplete="off" :value="@old('address', $patron->address)"></x-input>


                    <x-button class="mt-6">Save Patron </x-button>
                </form>

            </div>
        </div>
</x-app-layout>

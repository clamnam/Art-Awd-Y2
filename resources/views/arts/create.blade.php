<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

            <form action="{{ route('arts.store') }}" method="post">
                @csrf
                <x-input
                    type="text"
                    field="title"
                    name="title"
                    placeholder="Title"
                    class="w-full"
                    autocomplete="off"
                    :value="@old('title')"></x-input>

                    <x-textarea
                    name="description"
                    field="text"
                    rows="10"
                    placeholder="Description"
                    class="w-full">
                    :value="@old('description')"></x-textarea>
                    <x-input
                    type="text"
                    field="text"
                    name="genre"
                    placeholder="Genre"
                    class="w-full"
                    autocomplete="off"
                    :value="@old('genre')"></x-input>
                    <x-input
                    type="text"
                    field="text"
                    name="artist"
                    placeholder="Artist"
                    class="w-full"
                    autocomplete="off"
                    :value="@old('artist')"></x-input>


                        <x-button class="mt-6">Save Art  </x-button>
                </form>
<?php> <p>{{ $errors }}</p> ?>

        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                {{-- @foreach ($errors->all as $error)
            <p>{{ $error }}</p>

        @endforeach --}}
                {{-- form that takes in data and through store function in ArtController inserts the data into the database --}}
                {{-- enctype is a method of encrypting the form data --}}
                <form action="{{ route('admin.arts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-input type="text" field="title" name="title" placeholder="Title" class="w-full"
                        autocomplete="off" :value="@old('title')">
                    </x-input>

                    <x-textarea name="description" field="description" rows="10" placeholder="Description"
                        class="w-full" :value="@old('description')">
                    </x-textarea>

                    <x-input type="text" field="genre" name="genre" placeholder="Genre" class="w-full"
                        autocomplete="off" :value="@old('genre')"></x-input>
                    <x-input type="text" field="artist" name="artist" placeholder="Artist" class="w-full"
                        autocomplete="off" :value="@old('artist')"></x-input>
                    <div class="form-group">
                        <label for="patron">Patron</label>
                        <select name="patron_id">
                            @foreach ($patrons as $patron)
                                <option value="{{ $patron->id }}"
                                    {{ old('patron_id') == $patron->id ? 'selected' : '' }}>
                                    {{ $patron->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <x-input type="file" name="art_image" placeholder="Art Piece" class="w-full mt-6"
                        field="art_image">

                    </x-input>




                    <x-button class="mt-6">Save Art </x-button>
                </form>


            </div>
        </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Arts') }}
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

                    <h2 class=" font-bold text-4xl"> {{ $art->title }}</h2>
                    <p class="mt-2">
                        {{ $art->description }}
                        <br>
                        {{ $art->artist }}

                        {{ $art->genre }}

                    <p class=""><span class="font-bold">Patron : </span> {{ $art->patron->name }}</p>
                    @foreach ($art->style as $style)
                        <tr>
                            <td>
                                <p><span class="font-bold">Art Style : </span>{{ $style->name }}</p>
                    @endforeach

                    <p class="mt-4 whitespace-pre-wrap"{{ $art->text }}></p>
                    <div class="">
                        {{-- brings images in using file names stored in the db, that are stored in the path in asset --}}
                        <tr>
                            <td rowspan="6">
                                <img src="{{ asset('storage/images/' . $art->art_image) }}" width="150"
                                    alt="">
                            </td>
                        </tr>
                    </div>
                </div>


            </div>
            <div class="flex">
                <a class="items-end btn-link" href="{{ route('admin.arts.edit', $art) }}">Edit art</a>

                <form action="{{ route('admin.arts.destroy', $art) }}" method="post">
                    @method('delete')
                    @csrf
                    {{-- Allows you to delete with an "are you sure?" prompt --}}
                    <button type="submit" class="btn-link bg-red-600 ml-4"
                        onclick="return confirm('Are you sure you wish to delete this art?')">Delete piece</button>
                </form>

            </div>
            {{-- diff for humans changes the db format of date to a more readable format --}}

            <p class="opacity-70 ml-8"><strong>Created: </strong> {{ $art->created_at->diffForHumans() }}</p>
            <p class="opacity-70 ml-8"><strong>Updated at: </strong> {{ $art->updated_at->diffForHumans() }}</p>
        </div>
</x-app-layout>

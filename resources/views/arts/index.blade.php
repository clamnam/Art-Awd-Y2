<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Art') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">




            <a href="{{ route('arts.create') }}" class=" mt-6">Add an art piece</a>


            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            @forelse ($arts as $art)

                        <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                            <a href="{{ route('arts.show', $art) }}">{{ $art->title }}</a>

                    <p class="mt-2">
                        {{ $art->description}}
                        <br>
                        {{ $art->artist}}

                        {{ $art->genre}}


                    </p>
                    <span class="block mt-4 text-sm opacity-70">{{ $art->updated_at->diffForHumans() }}</span>

                </div>

            @empty
            <p>No Art</p>
            @endforelse
            {{ $arts->links() }}

        </div>
    </div>
</x-app-layout>

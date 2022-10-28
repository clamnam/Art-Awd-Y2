<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            <a href="{{ route('arts.create') }}" class="btn-link btn-lg mb-2">Add a art</a>
            @forelse ($arts as $art)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                    <a href="{{ route('arts.show', $art) }}">{{ $art->title }}</a>
                    </h2>
                    <p class="mt-2">
                        {{ $art->category }}
                        {{$art->author}}
                        {{$art->description}}

                    </p>

                </div>
            @empty
            <p>No Arts</p>
            @endforelse
            <!-- This line of code simply adds the links for Pagination-->
            {{$arts->links()}}
        </div>
    </div>
</x-app-layout>
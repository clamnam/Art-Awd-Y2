
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Arts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex">

            </div>
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class=" font-bold text-4xl"> {{ $art->title}}</h2>

                    <p class="mt-2">
                        {{ $art->description}}
                        <br>
                        {{ $art->artist}}

                        {{ $art->genre}}


                    </p>

<p class="mt-4 whitespace-pre-wrap"{{ $art->text }}></p>

                </div>

        </div>
        <p class="opacity-70 ml-8"><strong>Created: </strong> {{ $art->created_at->diffForHumans() }}</p>
        <p class="opacity-70 ml-8"><strong>Updated at: </strong> {{ $art->updated_at->diffForHumans() }}</p>
    </div>
</x-app-layout>

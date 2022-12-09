<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Style') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">




            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            @forelse ($styles as $style)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    {{-- Brings you to the show page with a link in the title --}}
                    <a href="{{ route('user.styles.show', $style) }}">{{ $style->name }}</a>

                    <p class="mt-2">
                        {{ $style->description }}



                    </p>

                </div>

            @empty
                <p>No Style</p>
            @endforelse

        </div>
    </div>
</x-app-layout>

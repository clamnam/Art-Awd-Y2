<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Art') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



            {{-- brings you to create.blade.php where you can add a new piece --}}
            <a href="{{ route('admin.styles.create') }}" class="btn-lg btn-link mt-6">Add style </a>
            {{-- success printed if you add piece and return to this page --}}
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            @forelse ($styles as $style)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    {{-- Brings you to the show page with a link in the title --}}
                    <a href="{{ route('admin.styles.show', $style) }}">{{ $style->title }}</a>

                    <p class="mt-2">
                        {{ $style->description }}
                    </p>


                </div>

            @empty
                <p>No Style</p>
            @endforelse
            {{-- links to different pages --}}
            {{-- {{ $styles->links() }} --}}

        </div>
    </div>
</x-app-layout>

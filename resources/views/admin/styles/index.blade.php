<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Style') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



            {{-- goes through style function of style controller to create.blade.php --}}
            <a href="{{ route('admin.styles.create') }}" class="btn-lg btn-link mt-6">Add style </a>
            {{-- success printed if you add piece and return to this page --}}
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            @forelse ($styles as $style)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    {{-- goes through style function of style controller to create.blade.php --}}
                    <a href="{{ route('admin.styles.show', $style) }}"><span class="font-bold">Art style : </span>
                        {{ $style->name }}</a>

                    <p class="mt-2">
                        <span class="font-bold">Style description : </span> {{ $style->description }}
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

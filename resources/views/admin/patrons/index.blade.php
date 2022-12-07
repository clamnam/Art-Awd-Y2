<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patron') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



            {{-- brings you to create.blade.php where you can add a new piece --}}
            <a href="{{ route('admin.patrons.create') }}" class="btn-lg btn-link mt-6">Add a patron</a>
            {{-- success printed if you add piece and return to this page --}}
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            @forelse ($patrons as $patron)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    {{-- Brings you to the show page with a link in the title --}}
                    <a href="{{ route('admin.patrons.show', $patron) }}">{{ $patron->name }}</a>

                    <p class="mt-2">
                        {{ $patron->address }}
                        <br>


                    </p>

                </div>

            @empty
                <p>No Patrons</p>
            @endforelse
            {{-- links to different pages --}}
            {{-- {{ $patrons->links() }} --}}

        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MagicImages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="{{ route('magic-images.create') }}">create</a>
                @include('magic-images.magic-image-table',['magic-images'=>$magic_images])
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MagicImage Data') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @livewire('magic-images.update-magic-image-form', ['magicImage' => $magicImage])
            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('magic-images.delete-magic-image-form', ['magicImage' => $magicImage])
            </div>
        </div>
    </div>
</x-app-layout>

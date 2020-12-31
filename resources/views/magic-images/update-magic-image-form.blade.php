<x-jet-form-section submit="updateMagicImage">
    <x-slot name="title">
        {{ __('MgaicImage') }}
    </x-slot>

    <x-slot name="description">
        {{ __('The script to make.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />

            <x-jet-input id="name"
                         type="text"
                         class="mt-1 block w-full"
                         wire:model.defer="state.name"
                />

            <x-jet-input-error for="name" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Script') }}" />

            <textarea id="script"
                      rows=10
                      class="form-textarea rounded-md shadow-sm mt-1 block w-full"
                      placeholder="print('Hello,world!');"
                      wire:model.defer="state.script"></textarea>

            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Configure') }}" />

            <textarea id="configure"
                      rows=10
                      class="form-textarea rounded-md shadow-sm mt-1 block w-full"
                      placeholder="# Hi"
                      wire:model.defer="state.configure"></textarea>

            <x-jet-input-error for="name" class="mt-2" />
        </div>
    </x-slot>


    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Destory') }}
        </x-jet-button>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>

</x-jet-form-section>

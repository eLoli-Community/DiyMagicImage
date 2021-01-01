<div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <img src="{{ $imageUrl }}" />
                {{ $imageOutput }}
            </div>
        </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <form wire:submit.prevent="updateMagicImage">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
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
                        <div class="hidden col-span-6 sm:col-span-4">
                            <x-jet-label for="name" value="{{ __('Configure') }}" />

                            <textarea id="configure"
                                      rows=10
                                      class="form-textarea rounded-md shadow-sm mt-1 block w-full"
                                      placeholder="# Hi"
                                      wire:model.defer="state.configure"></textarea>

                            <x-jet-input-error for="name" class="mt-2" />
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <div x-data="{ shown: false, timeout: null }"
                         x-init="@this.on('saved', (debug) => {
                             clearTimeout(timeout);
                             shown = true;
                             timeout = setTimeout(() => {
                                 shown = false;
                             }, 2000);
                             eval(debug);
                         });"
                         x-show.transition.opacity.out.duration.1500ms="shown"
                         style="display: none;"
                         class="text-sm text-gray-600 mr-3">
                        {{ __('Saved.') }}
                    </div>

                    <x-jet-button>
                        {{ __('Save') }}
                    </x-jet-button>
                </div>
            </div>
        </form>
    </div>
</div>

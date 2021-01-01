<div class="md:col-span-1">
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
            <div x-data="{ shown: false, timeout: null }"
                 x-init="@this.on('saved', () => {
                             clearTimeout(timeout);
                             shown = true;
                             timeout = setTimeout(() => {
                                 shown = false;
                             }, 2000);
                         });"
                 x-show.transition.opacity.out.duration.1500ms="shown"
                 style="display: none;"
                 class="text-sm text-gray-600 mr-3">
                {{ __('Saved.') }}
            </div>
            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border
                           border-transparent rounded-md font-semibold text-xs text-white
                           uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900
                           focus:outline-none focus:border-gray-900 focus:shadow-outline-gray
                           disabled:opacity-25 transition ease-in-out duration-150"
                    x-data x-on:click="this.disable=true;$wire.call('updateMagicImageScript',editor.getValue())"
                    id="save">
                {{ __('Save') }}
            </button>
        </div>
        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
            <div x-data="{ shown: false, timeout: null }"
                 x-init="@this.on('debug', (debug) => {
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
                {{ __('Finish.') }}
            </div>
            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border
                           border-transparent rounded-md font-semibold text-xs text-white
                           uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900
                           focus:outline-none focus:border-gray-900 focus:shadow-outline-gray
                           disabled:opacity-25 transition ease-in-out duration-150"
                    x-data x-on:click="this.disable=true;$wire.call('debugMagicImage',editor.getValue())"
                    id="debug">
                {{ __('Debug') }}
            </button>
        </div>
        <div class="px-4 py-5 bg-white sm:p-6">
            <img src="{{ $imageUrl }}"/>
            {{ $imageOutput }}
        </div>
    </div>
</div>

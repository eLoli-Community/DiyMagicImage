<div class="mt-5 md:mt-0 md:col-span-2">
    <div class="shadow overflow-hidden sm:rounded-md">
        <div id="container" class="w-full" style="height:90vh"></div>
    </div>
</div>

@push('styles')
    <link
        rel="stylesheet"
        data-name="vs/editor/editor.main"
        href="{{ asset('vs/editor/editor.main.css') }}"
    />
@endpush

@push('js')
    <script>
        var require = { paths: { vs: '{{ asset('vs') }}' } };
    </script>
    <script src="{{ asset('vs/loader.js') }}"></script>
    <script src="{{ asset('vs/editor/editor.main.nls.js') }}"></script>
    <script src="{{ asset('vs/editor/editor.main.js') }}"></script>

    <script>
        var editor = monaco.editor.create(document.getElementById('container'), {
            value: @json($magicImage->script),
            language: 'javascript'
        });
    </script>
@endpush


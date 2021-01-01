<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg align-middle">
                @foreach($magic_images as $magic_image)
                    <div class="sm:inline-flex
                        m-2 bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="sm:flex sm:items-center px-6 py-4">
                            <img class="block mx-auto rounded"
                                 style="max-width: 10rem;"
                                 src="{{ route('magic-images.show',['id'=>$magic_image->id]) }}" alt="">
                            <div class="mt-4 sm:mt-0 sm:ml-4 text-center sm:text-left">
                                <p class="text-xl leading-tight">{{ $magic_image->name }}</p>
                                <p class="text-sm leading-tight text-gray-600">Created at {{ $magic_image->created_at }}</p>
                                <p class="text-sm leading-tight text-gray-600">Updated at {{ $magic_image->updated_at }}</p>
                                <div class="mt-4">
                                    <button class="text-purple-500 hover:text-white hover:bg-purple-500 border
                                        border-purple-500 text-xs font-semibold rounded-full px-4 py-1
                                        leading-normal min-w-full sm:min-w-0" onclick="window.location.href='{{ route('magic-images.update',['id'=>$magic_image->id]) }}';">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
{{ $magic_images->links() }}

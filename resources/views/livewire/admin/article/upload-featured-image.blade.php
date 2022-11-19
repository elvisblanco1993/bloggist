<div>
    <p class="mt-8 text-sm font-medium text-slate-600">{{ __("Featured image") }}</p>
    <div class="mt-2 block">
        @if ($image)
        <img src="{{ $image->temporaryUrl() }}" alt="" class="block w-full aspect-video rounded-xl object-cover object-center">
        @elseif (!$image && $article->banner)
            <div class="relative">
                <button type="button" wire:click="deleteFeaturedImage" class="absolute right-0 mr-2 mt-2 w-8 h-8 flex items-center justify-center bg-white/80 hover:bg-red-500 rounded-xl border border-red-500 text-red-500 hover:text-white transition-all" title="Delete featured image">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                    </svg>
                </button>
                <img src="{{ asset($article->banner) }}" alt="" class="block w-full aspect-video rounded-xl object-cover object-center">
            </div>
        @endif
            <label for="file-upload" class="block mt-6 cursor-pointer p-2 text-center border border-gray-300 border-dashed rounded-md bg-white font-medium text-blue-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 hover:text-blue-500">
                <span>{{ __("Select featured image") }}</span>
                <span class="mt-2 block text-xs text-gray-600">{{ __("JPEG, PNG, WEBP, GIF up to 2MB") }}</span>
                <input wire:model="image" id="file-upload" name="file-upload" type="file" accept=".jpeg,.jpg,.png,.webp,.gif" class="sr-only">
            </label>
        @if ($image)
            <button type="button" wire:click="setFeaturedImage" class="mt-4 w-full text-center p-2 rounded-md bg-black text-white">{{ __("Upload Now") }}</button>
        @endif
        <x-jet-input-error for="image"/>
    </div>
</div>

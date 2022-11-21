<div>
    <form wire:submit.prevent="save">
        @csrf
        <nav class="w-full flex items-center justify-between px-4 sm:px-6 lg:px-8 py-2 border-b">
            <a href="{{ route('admin.articles') }}" class="flex items-center space-x-3 text-sm text-slate-600 hover:text-red-600 p-4">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M17 10a.75.75 0 01-.75.75H5.612l4.158 3.96a.75.75 0 11-1.04 1.08l-5.5-5.25a.75.75 0 010-1.08l5.5-5.25a.75.75 0 111.04 1.08L5.612 9.25H16.25A.75.75 0 0117 10z" clip-rule="evenodd" />
                </svg>
            </a>

            <div class="flex items-center space-x-3">
                <button type="submit" class="px-4 py-2 border-none rounded-md text-white text-xs uppercase tracking-wider font-medium bg-black hover:bg-gray-800 transition-all">{{ __("Save Changes") }}</button>
            </div>
        </nav>

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="py-12">
                <div class="">
                    <input type="text" wire:model="title" class="bg-transparent border-0 w-full text-2xl text-gray-800 font-bold outline-none border-transparent focus:border-transparent focus:ring-0" placeholder="{{ __("Title") }}">
                    <x-jet-input-error for="title"/>
                </div>
                <div class="mt-6">
                    <livewire:markdown-x />
                    <x-jet-input-error for="body"/>
                </div>
            </div>
        </div>
    </form>
</div>

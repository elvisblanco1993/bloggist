<div>
    <p class="mt-8 text-sm font-medium text-slate-600">{{ __("Categories") }}</p>
    <ul class="mt-2 h-64 bg-gray-100 rounded-lg overflow-y-auto">
        @forelse ($categories as $category => $item)
            <li class="p-2 flex items-center justify-between hover:bg-white rounded-lg">
                <label for="{{ $item->slug . $item->id }}" class="flex items-center space-x-3">
                    <input type="checkbox"
                        wire:click="syncCategories({{ $item->id }})"
                        class="rounded"
                        id="{{ $item->slug . $item->id }}" value="{{ $item->id }}"
                        {{ ($this->article->categories->where('id', $item->id)->count() == 1 ? ' checked' : '') }}
                    >
                    <span>{{ $item->name }}</span>
                </label>
            </li>
        @empty
        @endforelse
    </ul>
    <div x-data="{show_new_category_dialog : false}" class="my-6">
        <button type="button" @click="show_new_category_dialog = ! show_new_category_dialog" class="text-sm text-blue-600 hover:text-blue-500">{{ __("Add a new category") }}</button>
        <div x-show="show_new_category_dialog" class="mt-2">
            <div class="relative">
                <input type="text" wire:keydown.enter="addCategory" wire:model="newCategory" class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="" required>
                <button type="button" wire:click="addCategory" class="text-white absolute right-2.5 bottom-2.5 bg-gray-900 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2">Save</button>
            </div>
        </div>
    </div>
</div>

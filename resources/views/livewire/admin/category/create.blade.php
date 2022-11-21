<div>
    <button wire:click="$toggle('modal')" class="px-4 py-2 border-none rounded-md text-white text-xs uppercase tracking-wider font-medium bg-black hover:bg-gray-800 transition-all">{{ __("New Category") }}</button>

    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">{{ __("New category") }}</x-slot>
        <x-slot name="content">
            <label for="name">{{ __("Category name") }}</label>
            <x-jet-input type="text" id="name" wire:model="name" class="mt-1 w-full" />
            <x-jet-input-error for="name" class="mt-2 text-sm" />
        </x-slot>
        <x-slot name="footer">
            <button wire:click="$toggle('modal')">{{ __("Nevermind") }}</button>
            <button wire:click="save" class="ml-4 px-4 py-2 border-none rounded-md text-white text-xs uppercase tracking-wider font-medium bg-gray-900 hover:bg-gray-800 transition-all">{{ __("Save category") }}</button>
        </x-slot>
    </x-jet-dialog-modal>
</div>

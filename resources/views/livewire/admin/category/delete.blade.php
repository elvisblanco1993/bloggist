<div>
    <button wire:click="$toggle('modal')" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>

    <x-jet-confirmation-modal wire:model="modal">
        <x-slot name="title">
            {{ __("Are you sure you want to delete this category?") }}
        </x-slot>
        <x-slot name="content">
            {{ __("This action cannot be undone. If you need to restore this category later on, you will need to create it again.") }}
        </x-slot>
        <x-slot name="footer">
            <button wire:click="$toggle('modal')">{{ __("Nevermind") }}</button>
            <button wire:click="delete" class="ml-4 px-4 py-2 border-none rounded-md text-white text-xs uppercase tracking-wider font-medium bg-red-600 hover:bg-red-500 transition-all">{{ __("Delete category") }}</button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>

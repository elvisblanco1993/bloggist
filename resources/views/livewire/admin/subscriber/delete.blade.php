<div>
    <button wire:click="$toggle('modal')" class="font-medium text-red-600 dark:text-red-500 hover:underline">{{ __("Delete") }}</button>
    <x-jet-confirmation-modal wire:model="modal">
        <x-slot name="title">
            {{ __("Are you sure you want to delete $subscriber->email?") }}
        </x-slot>
        <x-slot name="content">
            {{ __("This action will destroy this record and it will be unrecoverable.") }}
        </x-slot>
        <x-slot name="footer">
            <button wire:click="$toggle('modal')">{{ __("Nevermind") }}</button>
            <button wire:click="delete" class="ml-4 px-4 py-2 border-none rounded-md text-white text-xs uppercase tracking-wider font-medium bg-red-600 hover:bg-red-500 transition-all">{{ __("Delete subscriber") }}</button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>

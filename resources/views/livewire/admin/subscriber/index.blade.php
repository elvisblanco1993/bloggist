<div>
    <div class="flex items-center justify-between">
        <h1 class="text-4xl font-extrabold">{{ __("Subscribers") }}</h1>
        @livewire('admin.subscriber.create')
    </div>

    <div class="py-10">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            {{ __("Subscriber") }}
                        </th>
                        <th scope="col" class="py-3 px-6">
                            {{ __("Status") }}
                        </th>
                        <th scope="col" class="py-3 px-6">
                            {{ __("Subscribed at") }}
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <span class="sr-only">{{ __("Edit") }}</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($subscribers as $subscriber)
                        <tr @class([
                            'bg-white hover:bg-gray-50',
                            'border-b' => !$loop->last
                        ])>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                {{ $subscriber->email }}
                            </th>
                            <td class="py-4 px-6">
                                {{ ($subscriber->subscribed_at && !$subscriber->unsubscribed_at) ? __('Subscribed') : __('Unsubscribed') }}
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-2 py-0.5 rounded text-xs tracking-wider text-slate-600 bg-slate-100">{{ Carbon\Carbon::parse($subscriber->subscribed_at)->format('M d, Y @ H:i a') }}</span>
                            </td>
                            <td class="px-6 py-4 flex items-center justify-end space-x-4">
                                @livewire('admin.subscriber.delete', ['subscriber' => $subscriber], key($subscriber->id . '-delete'))
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            {{ $subscribers->links() }}
        </div>
    </div>
</div>

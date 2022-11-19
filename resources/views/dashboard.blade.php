<x-app-layout>
    <div class="flex items-center justify-between">
        <h1 class="text-4xl font-extrabold">{{ __("Dashboard") }}</h1>
    </div>

    <div class="my-10">
        <dl class="grid grid-cols-1 gap-5 sm:grid-cols-3">
            <div class="px-4 py-5 bg-white shadow border border-gray-200 rounded-lg overflow-hidden sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">Total subscribers</dt>
                <dd class="mt-1 text-3xl font-medium text-gray-900">0</dd>
            </div>
            <div class="px-4 py-5 bg-white shadow border border-gray-200 rounded-lg overflow-hidden sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">7-day total reads</dt>
                <dd class="mt-1 text-3xl font-medium text-gray-900">0</dd>
            </div>
            <div class="px-4 py-5 bg-white shadow border border-gray-200 rounded-lg overflow-hidden sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">7-day growth</dt>
                <dd class="mt-1 text-3xl font-medium text-gray-900">0</dd>
            </div>
        </dl>
    </div>
</x-app-layout>

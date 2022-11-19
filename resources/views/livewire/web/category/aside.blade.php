<div>
    <p class="text-sm font-medium text-gray-600 border-b pb-3">Filter by categories</p>
    <ul class="mt-4 text-xs w-full">
        @forelse ($availableCategories as $category)
            <a href="" class="px-2 py-1 rounded-md bg-gray-100 hover:bg-gray-300 mx-0.5 my-1 inline-block">#{{ $category->name }}</a>
        @empty

        @endforelse
    </ul>
</div>

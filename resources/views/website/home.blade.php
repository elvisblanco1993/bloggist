<x-guest-layout>
    <div class="w-full bg-amber-400">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-36 text-gray-900">
            <h1 class="text-5xl xl:text-7xl title font-bold md:font-semibold">{{ __("Write freely.") }}</br>{{ __("Read on.") }}</h1>
            <p class="mt-6 text-xl">{{ __("The platform for readers and writers alike. Whether you are looking for the perfect place to lay down your thoughts, or for amazing stories to read, you just got to the right place.") }}</p>
        </div>
    </div>
    <div class="my-12"></div>
    {{-- Articles --}}
    <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <h3 class="lg:text-xl xl:text-2xl font-bold text-black">{{ __("Latest stories") }}</h3>
        @livewire('web.article.index')
    </main>
</x-guest-layout>

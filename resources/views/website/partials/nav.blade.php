<div class="sticky top-0 bg-white/95 text-slate-600 overflow-hidden">
    <nav class="max-w-7xl mx-auto h-16 md:h-24 px-4 sm:px-6 lg:px-8">
        <div class="h-full flex items-center justify-between">
            <a href="{{ route('home') }}" class="text-xl text-black font-bold">
                {{-- <span class="py-3 px-1 bg-black text-white">la</span> bahia --}}
                bloggist
            </a>
            <ul class="flex items-center space-x-4 text-base">
                <li>@livewire('web.article.query')</li>
                <li class="text-gray-200">|</li>
                <li>
                    <a href="{{ route('login') }}">Sign In</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="px-4 py-2.5 bg-black text-white rounded-full">Get started</a>
                </li>
            </ul>
        </div>
    </nav>
</div>

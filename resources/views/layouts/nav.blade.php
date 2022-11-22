<aside class="hidden md:block md:col-span-3 lg:col-span-2 py-12">
    <a href="{{ route('dashboard') }}" class="text-xl font-bold">
        {{-- <span class="py-3 px-1 bg-black text-white">la</span> bahia --}}
        bloggist
    </a>
    <div class="my-6 border-t"></div>

    <a href="{{ route('dashboard') }}" @class([
        'block py-2 px-6 hover:bg-gray-100',
        'border-l-4 border-l-black' => request()->routeIs('dashboard'),
    ])>{{ __("Dashboard") }}</a>
    <a href="{{ route('admin.articles') }}" @class([
        'block py-2 px-6 hover:bg-gray-100',
        'border-l-4 border-l-black' => request()->routeIs('admin.articles'),
    ])>{{ __("Articles") }}</a>
    <a href="{{ route('admin.categories') }}" @class([
        'block py-2 px-6 hover:bg-gray-100',
        'border-l-4 border-l-black' => request()->routeIs('admin.categories'),
    ])>{{ __("Categories") }}</a>
    <a href="{{ route('admin.subscribers') }}" @class([
        'block py-2 px-6 hover:bg-gray-100',
        'border-l-4 border-l-black' => request()->routeIs('admin.subscribers'),
    ])>{{ __("Subscribers") }}</a>
    <a href="{{ route('profile.show') }}" @class([
        'block py-2 px-6 hover:bg-gray-100',
        'border-l-4 border-l-black' => request()->routeIs('profile.show'),
    ])>{{ __("Profile") }}</a>
    <form method="POST" action="{{ route('logout') }}" x-data>
        @csrf
        <a href="{{ route('logout') }}"
            class="block py-2 px-6 hover:bg-gray-100 whitespace-nowrap"
            @click.prevent="$root.submit();"
        >{{ __('Log Out') }}</a>
    </form>
</aside>

<nav class="block md:hidden col-span-12">
    <div class="h-16 flex items-center justify-between">
        <a href="{{ route('dashboard') }}" class="text-xl font-bold">
            {{-- <span class="py-3 px-1 bg-black text-white">la</span> bahia --}}
            bloggist
        </a>

        <x-jet-dropdown>
            <x-slot name="trigger">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </x-slot>
            <x-slot name="content">
                <x-jet-dropdown-link href="{{ route('dashboard') }}">{{__("Dashboard")}}</x-jet-dropdown-link>
                <x-jet-dropdown-link href="{{ route('admin.articles') }}">{{__("Articles")}}</x-jet-dropdown-link>
                <x-jet-dropdown-link href="{{ route('admin.categories') }}">{{__("Categories")}}</x-jet-dropdown-link>
                <x-jet-dropdown-link href="{{ route('admin.subscribers') }}">{{__("Subscribers")}}</x-jet-dropdown-link>
                <x-jet-dropdown-link href="{{ route('profile.show') }}">{{__("Profile")}}</x-jet-dropdown-link>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <a href="{{ route('logout') }}"
                        class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition"
                        @click.prevent="$root.submit();"
                    >{{ __('Log Out') }}</a>
                </form>
            </x-slot>
        </x-jet-dropdown>
    </div>
</nav>

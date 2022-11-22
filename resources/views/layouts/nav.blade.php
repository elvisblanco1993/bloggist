<aside class="hidden md:block md:col-span-3 lg:col-span-2">
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

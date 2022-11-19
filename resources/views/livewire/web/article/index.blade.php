<div>
    <section class="my-8 grid grid-cols-6 gap-8">
        @forelse ($articles as $article)
            <article @class([
                'col-span-6 md:col-span-3 lg:col-span-2 w-full',
            ])>
                <a href="{{ route('article', ['article' => $article->slug]) }}">
                    <img src="{{ asset($article->banner) }}" alt="{{ __("Missing image") }}" class="w-full aspect-video sm:aspect-square object-cover object-center bg-no-repeat shadow">
                </a>
                <div class="mt-2">
                    @forelse ($article->categories as $category)
                        <a href="{{ route('category.show', ['category' => $category->slug]) }}" class="px-2 py-1 rounded-md bg-gray-100 hover:bg-gray-300 mx-0.5 my-1 inline-block text-xs">#{{ $category->name }}</a>
                    @empty
                    @endforelse
                </div>
                <a href="{{ route('article', ['article' => $article->slug]) }}" class="block mt-2 text-xl font-bold underline hover:text-gray-600 transition-all">{{ $article->title }}</a>
                <a href="{{ route('author.show', ['author' => $article->user->slug]) }}" class="mt-2 text-sm font-medium text-gray-800">{{ __("By") . ' ' . $article->user->name }}</a>
                <span class="text-sm font-medium text-gray-800">&middot; {{ Carbon\Carbon::parse($article->published_at)->format('M, d Y') }}</span>
                <p class="mt-2 text-sm text-gray-600">
                    {{
                        ($article->excerpt)
                        ? Str::limit($article->excerpt, 130, '[...]')
                        : Str::limit(strip_tags(Str::of($article->body)->markdown()), 130, '[...]')
                    }}
                </p>
            </article>
        @empty
        @endforelse
    </section>
</div>

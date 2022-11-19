<div>
    <div class="my-12 max-w-4xl mx-auto px-10">
        <div class="text-center">
            <h1 class="text-4xl font-black text-gray-900 ">{{ $article->title }}</h1>
            <p class="mt-4 text-sm text-gray-600  font-sans"><a href="{{ route('author.show', ['author' => str($article->user->name)->slug() ]) }}" class="">{{ __("By") . ' ' . $article->user->name }}</a> &middot; {{ Carbon\Carbon::parse($article->published_at)->format('M, d Y') }} &middot; {{ $article->time_to_read }} min read</p>
            <div class="block my-4">
                @forelse ($article->categories as $category)
                <a href="{{ route('category.show', ['category' => $category->slug]) }}" class="px-2 py-1 rounded-md bg-gray-100 hover:bg-gray-300 mx-0.5 my-1 inline-block text-xs">#{{ $category->name }}</a>
                @empty
                @endforelse
            </div>
        </div>
        <img src="{{ asset($article->banner) }}" alt="{{ $article->title }}" class="mt-6 w-full aspect-video object-cover object-center rounded-lg">
        <div class="mt-6 prose lg:prose-lg prose-amber prose-img:rounded-lg min-w-full article">
            {!! Str::markdown($article->body) !!}
        </div>

        @if ($article->comments)
            <div class="my-12">
                @include('website.partials.disqus-comments')
            </div>
        @endif
    </div>
</div>

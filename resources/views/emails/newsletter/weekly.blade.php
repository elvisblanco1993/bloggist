<x-mail::message>
# {{__("Your weekly digest is ready.")}}

{{__("Here are our latest articles, hand picked for you.")}}

@forelse ($articles as $article)
<div style="display: flex; align-items: center; margin-top: 2rem; margin-bottom: 2rem">
<div style="width: 96px; height: 96px">
<a href="{{ route('article', ['article' => $article->slug]) }}">
<img src="{{ asset($article->banner) }}" alt="" style="object-fit: cover; width: 96px; height: 96px">
</a>
</div>
<div style="margin-left: 1.5rem; width: auto;">
<a href="{{ route('article', ['article' => $article->slug]) }}" style="font-size: 1.125rem; font-weight: 800;">{{ $article->title }}</a>
<p style="appearance: none; font-size: 1rem; font-weight: 500; color:#5f5f5f">{{ Carbon\Carbon::parse($article->published_at)->format('M, d Y') }}</p>
</div>
</div>
@empty
@endforelse

{{__("Read on")}}!<br>
{{ config('app.name') }}
</x-mail::message>

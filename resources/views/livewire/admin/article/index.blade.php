<div>
    <div class="flex items-center justify-between">
        <h1 class="text-4xl font-extrabold">{{ __("Articles") }}</h1>
        <a href="{{ route('admin.articles.create') }}" class="px-4 py-2 border-none rounded-md text-white text-xs uppercase tracking-wider font-medium bg-black hover:bg-gray-800 transition-all">{{ __("New Article") }}</a>
    </div>

    <div class="py-10">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            {{ __("Title") }}
                        </th>
                        <th scope="col" class="py-3 px-6">
                            {{ __("Categories") }}
                        </th>
                        <th scope="col" class="py-3 px-6">
                            {{ __("Date") }}
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <span class="sr-only">{{ __("Edit") }}</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($articles as $article)
                        <tr @class([
                            'bg-white hover:bg-gray-50',
                            'border-b' => !$loop->last
                        ])>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                {{ $article->title }}
                            </th>
                            <td class="py-4 px-6">
                                @if ($article->categories->count() > 0)
                                    <span class="inline-block px-2 py-0.5 rounded text-xs tracking-wider text-slate-600 bg-slate-100"
                                        title="@forelse ($article->categories as $cat){{ $cat->name }} @if(!$loop->last), @endif @empty @endforelse"
                                    >{{ str($article->categories()->first()->name)->limit(10, '...') }}</span>
                                @else
                                    <span class="px-2 py-0.5 rounded text-xs tracking-wider text-slate-600 bg-slate-100">-</span>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                @if ($article->published_at)
                                    <span class="px-2 py-0.5 rounded text-xs tracking-wider text-green-600 bg-green-100">{{ __("Published") }}</span>
                                    <span class="text-xs">{{ \Carbon\Carbon::parse($article->published_at)->format('M d, Y') }}</span>
                                @elseif($article->trashed())
                                    <span class="px-2 py-0.5 rounded text-xs tracking-wider text-red-600 bg-red-100">{{ __("Trashed") }}</span>
                                    <span class="text-xs">{{ \Carbon\Carbon::parse($article->deleted_at)->format('M d, Y') }}</span>
                                @else
                                    <span class="px-2 py-0.5 rounded text-xs tracking-wider text-slate-600 bg-slate-100">{{ __("Draft") }}</span>
                                    <span class="text-xs">{{ \Carbon\Carbon::parse($article->updated_at)->format('M d, Y') }}</span>
                                @endif
                            </td>
                            <td class="px-6 flex items-center justify-end space-x-4">
                                @if (!$article->trashed())
                                    <a href="{{ route('admin.articles.edit', ['article' => $article->id]) }}" class="py-4 font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ __("Edit") }}</a>
                                @endif
                                @livewire('admin.article.delete', ['article' => $article])
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

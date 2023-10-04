<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a 
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2"
                href="{{ route('admin.articles.edit', $article->id) }}"
            >Edit</a>
            <form class="inline" method="POST" action="{{ route('admin.articles.destroy', $article) }}">
                @csrf
                @method('delete')
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">Delete</button>
            </form>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div>
                    <h2 class="uppercase text-xl font-bold">
                        title: 
                    </h2>
                    <div class="">
                    {{ $article->title}}
                    </div>
                </div>

                <div>
                    <h2 class="uppercase text-xl font-bold">
                        Content: 
                    </h2>
                    <div class="markdown">
                        {!! \Illuminate\Support\Str::markdown($article->full_text) !!}
                    </div>
                </div>

                @isset($article->image)
                    <div>
                        <h2 class="uppercase text-xl font-bold">
                            Image: 
                        </h2>
                        <div class="">
                            <img src="{{ $article->image }}" alt="article image">
                        </div>
                    </div>
                @endisset

                <div>
                    <h2 class="uppercase text-xl font-bold">
                        Category: 
                    </h2>
                    <div>
                        @isset($article->category)
                            <a class="hover:underline" href="{{ route('admin.categories.show', $article->category->id) }}">
                                {{ $article->category->name }}
                            </a>
                        @else
                            No category yet
                        @endisset
                    </div>
                </div>

                <div>
                    <h2 class="uppercase text-xl font-bold">
                        Tags: 
                    </h2>
                    <div class="">
                        <ul class="list-disc list-inside">
                            @forelse ($article->tags as $tag)
                                <li>
                                    <a class="hover:underline" href="{{ route('admin.tags.show', $tag->id) }}">
                                        {{ $tag->name }}
                                    </a>
                                </li>
                            @empty
                                <p>No tags yet</p>   
                            @endforelse
                        </ul>
                    </div>
                </div>

                <small class="py-2 text-sm text-gray-600">
                    Create at: 
                    {{ $article->created_at->format('j M Y, g:i a') }}
                </small>
            </div>
        </div>
    </div>
</x-app-layout>

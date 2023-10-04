<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a 
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2"
                href="{{ route('admin.categories.edit', $item->id) }}"
            >Edit</a>
            <form class="inline" method="POST" action="{{ route('admin.categories.destroy', $item) }}">
                @csrf
                @method('delete')
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">Delete</button>
            </form>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div>
                    <h2 class="uppercase text-xl font-bold">
                        Name: 
                    </h2>
                    <div class="">
                    {{ $item->name }}
                    </div>
                </div>
                <small class="py-4 text-sm text-gray-600">
                    Create at: 
                    {{ $item->created_at->format('j M Y, g:i a') }}
                </small>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md mt-5">
                <h2 class="uppercase text-xl font-bold">
                    Articles: 
                </h2>
                <ul class="list-disc list-inside">
                    @forelse ($item->articles as $article)
                        <li>
                            <a class="hover:underline" href="{{ route('admin.articles.show', $article->id) }}">
                                {{ $article->title }}
                            </a>
                        </li>
                    @empty
                        <p>No articles yet</p>   
                    @endforelse
                </ul>
            <div>
        </div>
    </div>
</x-app-layout>

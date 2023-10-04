<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($header) }}
            <a 
              class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2"
              href="{{ $createLink }}"
              >New</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <ul class="space-y-2">
                    @forelse($items as $item)
                        <li>
                            <a href="{{ $item->link }}" class="text-blue-500 hover:underline">
                                @isset($item->title)
                                    {{ $item->title }}
                                @else
                                    {{ $item->name}}
                                @endisset
                            </a>
                        </li>
                    @empty
                        <p class="font-light text-gray-400">No items yet</p>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
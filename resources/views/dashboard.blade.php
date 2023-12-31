<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($header) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <ul class="space-y-2">
                    @forelse($items as $item)
                        <li>
                            <a href="{{ $item->link }}" class="text-blue-500 hover:underline">
                                {{ $item->name }}
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

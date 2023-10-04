<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Edit Tag
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
              <form method="POST" action="{{ route('admin.tags.update', $tag) }}">
                @csrf
                @method('patch')
                <div class="mt-1 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                  <div class="sm:col-span-4">
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900 uppercase">Name</label>
                    <div class="mt-2">
                      <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <input type="text" name="name" id="name" autocomplete="name" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Tag Name" value="{{ $tag->name }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mt-6 flex items-center gap-x-6">
                  <a type="button" href="{{ route('admin.tags.show', $tag->id) }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                  <button type="submit" class="rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Update</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</x-app-layout>

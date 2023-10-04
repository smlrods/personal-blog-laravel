<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Update Article
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
              <form id="editArticleForm" method="POST" action="{{ route('admin.articles.update', $article) }}">
                @csrf
                @method('patch')
                <div class="mt-1 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                  <div class="sm:col-span-4">
                    <label for="Title" class="block text-sm font-medium leading-6 text-gray-900 uppercase">
                      Title
                    </label>
                    <div class="mt-2">
                      <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <input type="text" name="title" id="title" autocomplete="title" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Article Title" value="{{ $article->title }}">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="mt-1 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                  <div class="sm:col-span-4">
                    <label for="full_text" class="block text-sm font-medium leading-6 text-gray-900 uppercase">
                      Content
                    </label>
                    <div class="mt-2">
                      {{-- <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <textarea name="full_text" id="full_text" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Article Text">{{ $article->full_text }}</textarea> --}}
                        <div id="editor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></div>
                        <input type="hidden" name="full_text" id="full_text" value="{{ $article->full_text }}">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="mt-1 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                  <div class="sm:col-span-4">
                    <label for="image_url" class="block text-sm font-medium leading-6 text-gray-900 uppercase">
                      Image url
                    </label>
                    <div class="mt-2">
                      <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <input type="text" name="image" id="image_url" autocomplete="image" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Article image" value="{{ $article->image }}"/>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="mt-1 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                  <div class="sm:col-span-4">
                    <label for="category" class="block text-sm font-medium leading-6 text-gray-900 uppercase">
                      Category
                    </label>
                    <div class="mt-2">
                      <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <select rtype="text" name="category_id" id="category" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                          <option value="">No category</option>
                          @forelse ($categories as $category)
                            <option {{ $article->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                          @empty
                            <option class="text-gray-500" disabled selected>No categories yet</option>
                          @endforelse
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="mt-1 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                  <div class="sm:col-span-4">
                    <p class="block text-sm font-medium leading-6 text-gray-900 uppercase">
                      tags
                    </p>
                    <div class="mt-2">
                      <div class="flex items-center sm:max-w-md">
                        @forelse ($tags as $tag)
                          <div class="mx-2">
                            <input 
                              {{ 
                                $article->tags->contains('id', $tag->id) ?
                                'checked' :
                                ''
                              }} 
                              class="form-checkbox" 
                              type="checkbox" 
                              value="{{ $tag->id }}" 
                              id="tag-{{ $tag->id }}" 
                              name="tags[]">
                            <label for="tag-{{ $tag->id }}">
                              {{ $tag->name }}
                            </label>
                          </div>
                        @empty
                          <p>No tags yet</p>
                        @endforelse
                      </div>
                    </div>
                  </div>
                </div>

                <div class="mt-6 flex items-center gap-x-6">
                  <a type="button" href="{{ route('admin.articles.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                  <button type="submit" class="rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Update</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</x-app-layout>

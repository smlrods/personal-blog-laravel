<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.public.navigation')

    <div class="container mx-auto mt-8 px-4">
        <h1 class="text-4xl font-bold mb-8">
            {{ $article->title }}
        </h1>
        <small class="py-2 text-sm text-gray-600">
            Create at: 
            {{ $article->created_at->format('j M Y, g:i a') }}
        </small>

        @isset($article->image)
            <img class="w-1/2" src="{{ $article->image }}" alt="Article image">
        @endisset

        <p class="mt-2">
            {{-- {!! $article->full_text !!} --}}
            <div class="markdown">
                {!! \Illuminate\Support\Str::markdown($article->full_text) !!}
            </div>
        </p>
    </div>
</body>
</html>
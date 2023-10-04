<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    @include('layouts.public.navigation')

    <div class="container mx-auto mt-8 px-4">
        <h1 class="text-4xl font-bold mb-8">Welcome to My Blog</h1>

        @forelse ($articles as $article)
            <div class="article mb-8">
                <a href="{{ route('articles', $article->id) }}">
                    <h2 class="text-2xl font-semibold">
                        {{ $article->title }}
                    </h2>
                </a>
                <p class="mt-2">
                    {{ \Illuminate\Support\Str::limit($article->full_text, 50, $end='...') }}
                </p>
            </div>
        @empty
            <p>No articles yet</p>
        @endforelse
    </div>
</body>
</html>
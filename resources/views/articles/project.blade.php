@section('title', $project->name)@show
@section('image', $project->getOgImage($project->description, 'Centre d\'aide'))@show
@section('description', '')@show

<x-app>
    @include('articles.header')

    <section class="py-12 bg-gray-50">
        <div class="w-full max-w-6xl mx-auto px-4 sm:px-6 md:px-8 relative space-y-12">
            @foreach ($categories as $category => $articles)
            <div>
                <h2 class="text-xl font-bold md:text-2xl mb-6" id="{{ $articles->first()->category->slug }}">{{ $category }}</h2>
                <div class="grid gap-6 md:grid-cols-3">
                    @foreach ($articles as $article)
                    <a class="block transition transform rounded-md shadow-sm focus:outline-none focus:ring-4 hover:-translate-y-1 focus:ring-primary-200 bg-white rounded-md shadow"
                        href="{{ route('hc.article', ['project' => $project->slug, 'article' => $article->id, 'slug' => $article->slug]) }}">
                        <article class="flex flex-col p-6 space-y-4">
                            <header class="flex-1 space-y-1">
                                <h3 class="text-xl font-bold md:text-2xl">{{ $article->title }}</h3>
                            </header>

                            <footer class="flex items-center space-x-2">
                                <i class="fad fa-book text-primary-500"></i>

                                <p class="font-medium">{{ $article->views }} vues</p>
                            </footer>
                        </article>
                    </a>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </section>
</x-app>

<x-app>
    @include('articles.header')

    <section class="py-12 bg-gray-50">
        <div class="w-full max-w-6xl mx-auto px-4 sm:px-6 md:px-8 relative space-y-12">
            <div class="grid gap-6 md:grid-cols-3">
                @forelse ($articles as $article)
                <a class="block transition transform rounded-md shadow-sm focus:outline-none focus:ring-4 hover:-translate-y-1 focus:ring-primary-200 bg-white rounded-md shadow"
                    href="{{ route('hc.article', ['project' => $article->project->slug, 'article' => $article->id, 'slug' => $article->slug]) }}">
                    <article class="flex flex-col p-6 space-y-4">
                        <header class="flex-1 space-y-1">
                            <h3 class="text-xl font-bold md:text-2xl">{{ $article->title }}</h3>

                            <p class="text-gray-600">
                                …
                            </p>
                        </header>

                        <footer class="flex items-center space-x-2">
                            <i class="fad fa-book text-primary-500"></i>

                            <p class="font-medium">{{ $article->views }} vues</p>
                        </footer>
                    </article>
                </a>
                @empty
                <p class="text-2xl font-bold dark:text-white">Aucun article trouvé.</p>

                <div role="status" class="max-w-sm animate-pulse">
                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 mb-4"></div>
                    <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[360px] mb-2.5"></div>
                    <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
                    <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[330px] mb-2.5"></div>
                    <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[300px] mb-2.5"></div>
                    <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[360px]"></div>
                    <span class="sr-only">Loading...</span>
                </div>


                @endforelse
            </div>
        </div>
    </section>
</x-app>

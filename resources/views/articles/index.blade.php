<x-app>
    @include('articles.header')

    <section class="py-12 bg-gray-50">
        <div class="w-full max-w-6xl mx-auto px-4 sm:px-6 md:px-8 relative">
            <div class="grid gap-6 md:grid-cols-3">
                @foreach ($projects as $project)
                <a class="block transition transform rounded-md shadow-sm focus:outline-none focus:ring-4 hover:-translate-y-1 focus:ring-primary-200 bg-white rounded-md shadow"
                    href="{{ route('hc.project', ['project' => $project->slug]) }}">
                    <article class="flex flex-col p-6 space-y-4">
                        <header class="flex-1 space-y-1">
                            <h2 class="text-xl font-bold md:text-2xl">{{ $project->name }}</h2>

                            @if ($project->description)
                            <p class="text-gray-600">
                                {{ $project->description }}
                            </p>
                            @endif
                        </header>

                        <footer class="flex items-center space-x-2">
                            <i class="fad fa-book text-primary-500"></i>

                            <p class="font-medium">{{ $project->articles_count }} articles</p>
                        </footer>
                    </article>
                </a>
                @endforeach
            </div>
        </div>
    </section>
</x-app>

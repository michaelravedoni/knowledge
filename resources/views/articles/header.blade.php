<section class="relative text-white bg-gradient-to-b from-gray-700 to-black py-8 pb-12 md:pb-16">
    <div class="w-full max-w-6xl mx-auto px-4 sm:px-6 md:px-8 relative">
        <header class="relative grid items-center md:grid-cols-[3fr,2fr] md:gap-12">
            <aside class="md:py-6">
                <p class="text-sm font-bold tracking-wider uppercase text-brand-400">
                    @if (isset($article))
                        <a href="{{ route('hc.project', ['project' => $project->slug]) }}">{{ $project->name }}</a>
                        @if (isset($article->category))
                            · <a href="{{ route('hc.project', ['project' => $project->slug]) }}#{{ $article->category->slug }}">{{ $article->category->name }}</a>
                        @endif
                    @else
                        <a href="{{ route('hc') }}">Centre d'aide</a>
                    @endif
                </p>

                @if (isset($article))
                <div class="mt-2 text-4xl font-bold tracking-tight md:text-5xl font-headline">
                    Centre d'aide
                </div>
                @else
                <h1 class="mt-2 text-4xl font-bold tracking-tight md:text-5xl font-headline">
                    @if (isset($project))
                        {{ $project->name }}
                    @else
                    Centre d'aide
                    @endif
                </h1>
                @endif

                <p class="mt-4 font-medium text-gray-300 md:text-xl">
                    Vous avez une question, ou vous avez besoin d'aide ? Obtenez toutes les informations dont vous avez besoin, ici même.
                </p>

                <div class="mt-12">
                    <form method="get" action="{{ route('hc.search') }}">
                        <label for="default-search"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="search" id="default-search" name="q" value="{{ $q ?? null }}"
                                class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-brand-500 focus:border-brand-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-brand-500 dark:focus:border-brand-500"
                                placeholder="Search Mockups, Logos..." required>
                            <button type="submit"
                                class="text-white absolute right-2.5 bottom-2.5 bg-brand-700 hover:bg-brand-800 focus:ring-4 focus:outline-none focus:ring-brand-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-brand-600 dark:hover:bg-brand-700 dark:focus:ring-brand-800">Rechercher</button>
                        </div>
                    </form>
                </div>

            </aside>
        </header>
    </div>
</section>

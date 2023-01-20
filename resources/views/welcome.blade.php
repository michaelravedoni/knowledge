@section('title', 'Support')@show
@section('description', '')@show

<x-app>
    <section class="relative text-white bg-gradient-to-b from-gray-600 to-gray-900 md:py-8 md:pb-16">
        <div class="w-full max-w-6xl mx-auto px-4 sm:px-6 md:px-8 relative">
            <header class="relative grid items-center md:grid-cols-[3fr,2fr] md:gap-12">
                <aside class="space-y-4 md:py-6">

                    <h1 class="text-4xl font-bold tracking-tight md:text-5xl font-headline">
                        Support
                    </h1>

                    <p class="font-medium text-gray-300 md:text-xl">
                        Do you have a question, or need information about your server? Get all the info you need, right
                        here.
                    </p>

                </aside>
            </header>
        </div>
    </section>


    <section class="py-12 bg-gray-50">
        <div class="w-full max-w-6xl mx-auto px-4 sm:px-6 md:px-8 relative">
            <div class="grid gap-6 md:grid-cols-3">
                @if ($settings->enable_hc)
                <a href="{{ route('hc') }}"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <iconify-icon icon="material-symbols:library-books-outline" width="42"></iconify-icon>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Centre d'aide</h2>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Vous avez une question, ou vous avez besoin d'aide ? Obtenez toutes les informations dont vous avez besoin, ici même.</p>
                </a>
                @endif
            </div>
        </div>
    </section>
</x-app>

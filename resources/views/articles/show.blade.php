@section('title', $article->title)@show
@section('image', $article->getOgImage('', 'Centre d\'aide'))@show
@section('description', '')@show

<x-app>
    @include('articles.header')

    <section class="py-12 bg-gray-200">
        <div class="w-full max-w-3xl mx-auto px-4 sm:px-6 md:px-8 relative">
            <div class="bg-gray-50 px-6 py-12 -mt-20 rounded">
                <article class="prose sm:prose-sm md:prose-md lg:prose-lg max-w-none">

                    <h1 class="text-lg lg:text-2xl font-bold dark:text-white">{{ $article->title }}</h1>

                    @foreach ($article->content as $block)

                        @if ($block['type'] == 'content')
                        <p class="mb-3 font-light text-gray-500 dark:text-gray-400">{!! data_get($block, 'data.content') !!}</p>

                        @elseif ($block['type'] == 'block')
                        <div class="flex flex-col md:flex-row p-4 my-4 text-sm kn-block-{{ data_get($block, 'data.level') }}" role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3 @if (! data_get($block, 'data.heading')) mt-6 @endif" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Info</span>
                            <div>
                                @if (data_get($block, 'data.heading'))
                                <div class="font-bold">{{ data_get($block, 'data.heading') }}</div>
                                @endif
                                {!! data_get($block, 'data.text') !!}
                            </div>
                        </div>

                        @elseif ($block['type'] == 'image')

                            @if(file_exists($imageFile = storage_path('app/public/'.data_get($block, 'data.url'))))
                            <img src="{{ asset('storage/'.data_get($block, 'data.url')) }}?v={{ md5_file($imageFile) }}" class="" alt="{{ data_get($block, 'data.alt') }}"/>
                            @endif
                            @if (data_get($block, 'data.caption'))
                            <div class="text-sm -mt-4">{{ data_get($block, 'data.caption') }}</div>
                            @endif

                        @endif
                    @endforeach

                </article>
            </div>
        </div>
    </section>
</x-app>

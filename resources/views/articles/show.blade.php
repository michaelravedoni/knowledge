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

                    @foreach (data_get($article, 'content.blocks') as $block)

                    @if ($block['type'] == 'paragraph')
                        <p class="mb-3 font-light text-gray-500 dark:text-gray-400">{!! data_get($block, 'data.text') !!}</p>

                    @elseif ($block['type'] == 'header')
                        <h{{ data_get($block, 'data.level') }} class="font-bold">{!! data_get($block, 'data.text') !!}</h{{ data_get($block, 'data.level') }}>

                    @elseif ($block['type'] == 'delimiter')
                        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

                    @elseif ($block['type'] == 'quote')
                        <div class="flex flex-col md:flex-row p-4 my-4 text-sm kn-block-info" role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Info</span>
                            <div>
                                @if (data_get($block, 'data.caption'))
                                <div class="font-bold">{{ data_get($block, 'data.caption') }}</div>
                                @endif
                                {!! data_get($block, 'data.text') !!}
                            </div>
                        </div>

                    @elseif ($block['type'] == 'table')
                        <table class="table table-sm">
                            @if (data_get($block, 'data.withHeadings'))
                            <thead>
                                <tr>
                                    @foreach (data_get($block, 'data.content.0') as $column)
                                    <th>{{ $column }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            @endif
                            <tbody>
                                @foreach (data_get($block, 'data.content') as $row)
                                <tr>
                                    @foreach ($row as $cell)
                                    <td>{{ $cell }}</td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    @elseif ($block['type'] == 'image')
                        <img src="{{ data_get($block, 'data.file.url') }}" class="@if(data_get($block, 'data.withBackground')) max-w-md mx-auto @endif"/>

                        @if (data_get($block, 'data.caption'))
                        <div class="text-sm -mt-4">{{ data_get($block, 'data.caption') }}</div>
                        @endif

                    @elseif ($block['type'] == 'code')
                        <pre>{{ data_get($block, 'data.code') }}</pre>

                    @endif

                    @endforeach

                </article>
            </div>
        </div>
    </section>
</x-app>

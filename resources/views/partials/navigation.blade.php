<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="{{ route('home') }}" class="flex items-center">
            @if(file_exists($logoFile = storage_path('app/public/'.$settings->logo)) && $settings->logo)
            <img src="{{ asset('storage/'.$settings->logo) }}?v={{ md5_file($logoFile) }}" class="h-6 mr-3 sm:h-9" alt="{{ $settings->site_name }} Logo"/>
            @endif
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">{{ $settings->site_name }}</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                @if ($settings->enable_hc)
                <li>
                    <a href="{{ route('hc') }}"
                        class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-brand-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Centre d'aide</a>
                </li>
                @endif

                <li>
                <button type="button" data-dropdown-toggle="language-dropdown-menu" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-brand-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                    {{ strtoupper(app()->getLocale()) }}
                  </button>
                  <!-- Dropdown -->
                  <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700" id="language-dropdown-menu">
                    <ul class="py-1" role="none">
                        @foreach ($settings->languages as $language)
                        <li>
                            <a href="{{ url()->current() }}?l={{ $language }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white
                            @if($language == session()->get('locale')) bg-gray-200 @endif" role="menuitem">
                            <div class="inline-flex items-center">
                                {{ ucfirst(locale_get_display_name($language, $language)) }}
                            </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                  </div>
                </li>

                @if ($settings->company_url)
                <li>
                    <a href="{{ $settings->company_url }}"
                        class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-brand-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">{{ $settings->company_name }}<iconify-icon inline icon="bi:arrow-right" class="ml-2"></iconify-icon></a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

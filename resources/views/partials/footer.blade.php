<footer class="p-4 bg-transparent md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800">
    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">
        {{ now()->format('Y') }}
        @if ($settings->site_name)
        <a href="{{ route('home') }}" class="hover:underline">{{ $settings->site_name }}</a>
        @endif
        @if ($settings->company_url)
        · <a href="{{ $settings->company_url }}" class="hover:underline">{{ $settings->company_name }}</a>
        @endif
    </span>
    <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500 dark:text-gray-400 sm:mt-0">
        @if ($settings->terms_url)
        <li>
            <a href="{{ $settings->terms_url }}" class="mr-4 hover:underline md:mr-6">Conditions d'utilisation</a>
        </li>
        @endif
        @if ($settings->privacy_url)
        <li>
            <a href="{{ $settings->privacy_url }}" class="mr-4 hover:underline md:mr-6">Politique de confidentialité</a>
        </li>
        @endif
        @if ($settings->contact_url)
        <li>
            <a href="{{ $settings->contact_url }}" class="hover:underline">Contact</a>
        </li>
        @endif
    </ul>
</footer>

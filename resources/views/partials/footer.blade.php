<footer class="p-4 bg-transparent md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800">
    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">{{ now()->format('Y') }} <a href="{{ route('home') }}" class="hover:underline">{{ config('app.name') }}</a>
    </span>
    <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500 dark:text-gray-400 sm:mt-0">
        <li>
            <a href="#" class="mr-4 hover:underline md:mr-6">Conditions d'utilisation</a>
        </li>
        <li>
            <a href="#" class="mr-4 hover:underline md:mr-6">Politique de confidentialité</a>
        </li>
        <li>
            <a href="#" class="hover:underline">Contact</a>
        </li>
    </ul>
</footer>

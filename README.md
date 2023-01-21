![Knowledge screenshot](/public/screenshots/screenshot.png)

# Knowledge

Welcome to Knowledge, the open-source software for building your knowledge base and help center 🛣

> Do not use in production. ![WIP](https://img.shields.io/badge/WIP-Work%20in%20progress-red?style=flat-square)

## Features

- Completely customisable knowledge base software
- Automatic slug generation
- Filament admin panel 💛
- Simplified role system (administrator, employee & user)
- Automatic OG image generation including branding color you've setup (saves in your storage, around 70kb per image), if title is too long it will strip automatically as well

## Requirements

- PHP >= 8.1
- Database (MySQL, PostgreSQL)
- GD Library (>=2.0) or
- Imagick PHP extension (>=6.5.7)

## Installation

First set up a database, and remember the credentials.

```
git clone https://github.com/michaelravedoni/knowledge.git
composer install
php -r "file_exists('.env') || copy('.env.example', '.env');"
php artisan key:generate
```

Now edit your `.env` file and set up the database credentials, including the app name you want.

Optionally you may set up the language with `APP_LOCALE`, if your language is not working we accept PR's for new languages. We recommend copying those files from the `lang/en` folder.
As well as the timezone can be set with `APP_TIMEZONE`, for example: `APP_TIMEZONE="Europe/Amsterdam"`.

Now run the following:

```
php artisan knowledge:install
```

And login with the credentials you've provided, the user you've created will automatically be admin.

## Deployment

To manage your servers and sites, we recommend using [Ploi.io](https://ploi.io/?ref=knowledge-readme) or Infomaniak. Obviously you're free to choose however you'd like to deploy this piece of software 💙

That being said, here's an deployment script example:

```sh
cd /home/ploi/example.com
git pull origin main
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev
echo "" | sudo -S service php8.1-fpm reload

php artisan route:cache
php artisan view:clear
php artisan migrate --force

npm ci
npm run build

echo "🚀 Application deployed!"
```

Alternatively you can also use the upgrade command to clean up your deployment script:

```sh
cd /home/ploi/example.com
git pull origin main
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev
echo "" | sudo -S service php8.1-fpm reload

php artisan knowledge:upgrade

npm ci
npm run build

echo "🚀 Application deployed!"
```

If you're using queue workers (which we recommend to do) also add `php artisan queue:restart` to your deployment script.

## Role system

There's a simplified role system included in this roadmapping software. There's 3 roles: administrator, employee & user.

What are these roles allowed to do?

- Administrator
  - Obviously anything to users, items, projects, access admin
- Employee
  - These can access the admin, and see their assigned items (via a filter). What they can't do: settings, theme, users, CRUD projects.
- User
  - This is your default user when someone registers, they don't have access to the administration and can only access the frontend.

## Testing

TODO…

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Paid alternatives

Obviously, if you do not want to self host, there's plenty of self-hosted solutions, a small rundown:

- [Zendesk](https://zendesk.com/)

## Credits

- [Ploi Roadmap](https://github.com/ploi-deploy/roadmap)
- [Filament Admin](https://filamentadmin.com/)
- [Laravel](https://laravel.com/)
- [Flowbite](https://flowbite.com/)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

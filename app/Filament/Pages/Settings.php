<?php

namespace App\Filament\Pages;

use Filament\Pages\SettingsPage;
use App\Settings\GeneralSettings;
use Filament\Forms\Components\Card;
use Livewire\TemporaryUploadedFile;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\ColorPicker;

class Settings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = GeneralSettings::class;

    protected function getFormSchema(): array
    {
        return [

            Card::make([
                TextInput::make('site_name')
                    ->label('Nom du site')
                    ->required(),
                TextInput::make('company_name')
                    ->label('Nom de l\'entreprise')
                    ->required(),
                TextInput::make('company_url')
                    ->label('Site web de l\'entreprise')
                    ->url(),
            ]),

            Card::make([
                ColorPicker::make('color_primary'),
                FileUpload::make('favicon')
                    ->acceptedFileTypes(['image/png'])
                    ->helperText('Upload only .png file. Make sure your storage is linked (by running php artisan storage:link).')
                    ->disk('public')
                    ->imageResizeTargetHeight('64')
                    ->imageResizeTargetWidth('64')
                    ->maxSize(2048)
                    ->getUploadedFileUrlUsing(function ($record) {
                        return storage_path('app/public/favicon.png');
                    })
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        return (string)'favicon.png';
                    }),
                FileUpload::make('logo')
                    ->image()
                    ->helperText('Make sure your storage is linked (by running php artisan storage:link).')
                    ->disk('public')
                    ->imageResizeTargetWidth('512')
                    ->maxSize(2048)
                    ->getUploadedFileUrlUsing(function ($record) {
                        return storage_path('app/public/'.app(GeneralSettings::class)->logo);
                    })
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        $fileName = $file->getClientOriginalName();
                        $ext = substr(strrchr($fileName, '.'), 1);
                        return (string)'logo.'.$ext;
                    }),
            ])->columns(1),

            Card::make([
                TextInput::make('privacy_url')
                    ->label('URL vers la déclaration de confidentialité')
                    ->url(),
                TextInput::make('terms_url')
                    ->label('URL vers les conditions générales')
                    ->url(),
                TextInput::make('statuspage_url')
                    ->label('URL vers la statuspage')
                    ->url(),
            ]),

            Card::make([
                Toggle::make('enable_hc'),
                Toggle::make('enable_statuspage'),
                Toggle::make('enable_announcements'),
                Toggle::make('enable_user_report'),
                Toggle::make('enable_roadmap'),
            ]),

            /*
            TextInput::make('password')->helperText('Entering a password here will ask your users to enter a password before entering the knowledge.'),
            TextInput::make('custom_scripts')
                                ->label('Custom header script')
                                ->helperText('This allows you to add your own custom widget, or tracking tool. Code inside here will always be placed inside the head section.')
                                ->columnSpan(2),
            Card::make([
                    Toggle::make('block_robots')
                        ->helperText('Instructs your knowledge to add the block robots META tag, it\'s up to the search engines to honor this request.')
            ]),
            Repeater::make('send_notifications_to')
                ->columns(3)
                ->schema([
                    Select::make('type')
                        ->default('email')
                        ->reactive()
                        ->options([
                            'email' => 'E-mail',
                            'discord' => 'Discord',
                            'slack' => 'Slack'
                        ]),
                    TextInput::make('name')->label(function ($get) {
                        return match ($get('type')) {
                            'email' => 'Name receiver',
                            'discord', 'slack' => 'Label'
                        };
                    })->required(),
                    TextInput::make('webhook')
                        ->label(function ($get) {
                            return match ($get('type')) {
                                'email' => 'E-mail',
                                'discord' => 'Discord webhook URL',
                                'slack' => 'Slack webhook URL'
                            };
                        })
                        ->required()
                        ->url(function ($get) {
                            return $get('type') === 'discord' || $get('type') === 'slack';
                        })
                        ->email(function ($get) {
                            return $get('type') === 'email';
                        }),
                ])
                ->helperText('This will send email notifications once a new item has been created or when there is a new version of the knowledge software.')
                ->columnSpan(2),
            */
        ];
    }
}

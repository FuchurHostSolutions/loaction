<?php

namespace App\Filament\Pages\Auth;

use App\Models\User;
use Filament\Auth\Pages\Login as BaseLogin;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use SensitiveParameter;

class Login extends BaseLogin
{
    /**
     * Izinkan input teks biasa (Email atau Username), tidak dibatasi oleh validator HTML5 email saja.
     */
    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
            ->label('Email atau Username')
            ->required()
            ->autocomplete('username')
            ->autofocus();
    }

    /**
     * Resolusi otomatis kredensial: jika user memasukkan username (misal 'iqbal' atau 'admin'),
     * cari akun yang sesuai berdasarkan prefix email atau kolom name.
     */
    protected function getCredentialsFromFormData(#[SensitiveParameter] array $data): array
    {
        $login = trim($data['email']);

        // Jika bukan format email standar, cari user berdasarkan username / nama / email prefix
        if (! filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $login . '@loaction.id')
                ->orWhere('name', $login)
                ->orWhere('name', 'like', $login . ' %')
                ->orWhere('name', 'like', '%' . $login . '%')
                ->first();

            if ($user) {
                $login = $user->email;
            }
        }

        return [
            'email'    => $login,
            'password' => $data['password'],
        ];
    }
}

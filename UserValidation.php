<?php

namespace App\Validation;

class UserValidation
{
    public $userRules = [
        'username' => [
            'rules'  => 'required|alpha_numeric|min_length[3]|is_unique[users.username]',
            'errors' => [
                'required'    => 'Username wajib diisi.',
                'alpha_numeric' => 'Username hanya boleh mengandung huruf dan angka.',
                'min_length'  => 'Username harus terdiri dari minimal 3 karakter.',
                'is_unique'   => 'Username sudah terdaftar, gunakan username lain.'
            ],
        ],
        'email' => [
            'rules'  => 'required|valid_email|is_unique[users.email]',
            'errors' => [
                'required'    => 'Email wajib diisi.',
                'valid_email' => 'Harap masukkan email yang valid.',
                'is_unique'   => 'Email sudah terdaftar, gunakan email lain.'
            ],
        ],
        'password' => [
            'rules'  => 'required|min_length[8]',
            'errors' => [
                'required'   => 'Password wajib diisi.',
                'min_length' => 'Password harus terdiri dari minimal 8 karakter.'
            ],
        ],
        'password_confirm' => [
            'rules'  => 'matches[password]',
            'errors' => [
                'matches' => 'Konfirmasi password tidak sesuai dengan password.'
            ],
        ],
    ];
}

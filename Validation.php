<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    /**
     * Custom validation rules for project fields
     */
    public array $customRules = [
        'username' => [
            'rules' => 'required|alpha_numeric|min_length[3]|is_unique[users.username]',
            'errors' => [
                'required' => 'Username is required',
                'alpha_numeric' => 'Username can only contain alphanumeric characters',
                'min_length' => 'Username must be at least 3 characters long',
                'is_unique' => 'This username is already taken',
            ],
        ],
        'password' => [
            'rules' => 'required|min_length[8]',
            'errors' => [
                'required' => 'Password is required',
                'min_length' => 'Password must be at least 8 characters long',
            ],
        ],
        'email' => [
            'rules' => 'required|valid_email|is_unique[users.email]',
            'errors' => [
                'required' => 'Email is required',
                'valid_email' => 'Please enter a valid email address',
                'is_unique' => 'This email is already registered',
            ],
        ],
        'event_title' => [
            'rules' => 'required|max_length[100]',
            'errors' => [
                'required' => 'Event title is required',
                'max_length' => 'Event title cannot exceed 100 characters',
            ],
        ],
        'event_date' => [
            'rules' => 'required|valid_date',
            'errors' => [
                'required' => 'Event date is required',
                'valid_date' => 'Please enter a valid date',
            ],
        ],
    ];
}

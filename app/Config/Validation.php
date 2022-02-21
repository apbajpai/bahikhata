<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
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
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------

    public $signup = [
        'fname' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please Enter First Name.'
            ]
        ],
        'lname' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please Enter Last Name.'
            ]
        ],
        'user_email'    => [
            //'rules'  => 'required|valid_email|is_unique[tbl_user.email]',
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please Enter email.'
                //'valid_email' => 'Please enter a valid email.',
                //'is_unique' => 'Email already exist.'
            ]
        ],
        'user_mobile'    => [
            'rules'  => 'required|is_unique[tbl_user.user_mobile]|regex_match[/^[0-9]{10}$/]',
            'errors' => [
                'required' => 'Please Enter Mobile.',
                'regex_match' => 'Please enter a valid mobile.',
                'is_unique' => 'Mobile Number already exist.'
            ]
        ],
        
        'user_pass'    => [
            'rules'  => 'required|min_length[8]|regex_match[/[A-Z]+[a-z]+[\d!$%^&]+/]',
            'errors' => [
                'required' => 'Please Enter Password.',
                'min_length' => 'Please enter atleast 8 digit.',
                'regex_match' => 'Password must be at least 8 characters long with 1 Uppercase, 1 Lowercase & 1 Numeric character.'
            ]
        ],
        
        'user_confirm_pass'    => [
            'rules'  => 'required|matches[user_pass]',
            'errors' => [
                'required' => 'Please Enter Confirm Password.'
            ]
        ],
        'status' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Please Select Status.'
            ]
        ],
        
    ];

    public $duplicateMobile = [
        'user_mobile'    => [
            'rules'  => 'required|is_unique[tbl_user.user_mobile]|regex_match[/^[0-9]{10}$/]',
            'errors' => [
                'required' => 'Please Enter Mobile.',
                'regex_match' => 'Please enter a valid mobile.',
                'is_unique' => 'Mobile Number already exist.'
            ]
        ]
    ];
}

<?php

return [
    'name' => [
        'required' => 'Name is required'
    ],
    'email' => [
        'required' => 'Email is required',
        'unique' => '',
        'already_existed' => '',
        'invalid' => 'Invalid email address',
        'valid' => 'Valid email address',
        'regex' => 'Invalid email address format',
        'max' => 'Email address have max allows characters',
        'min' => 'Email have not min allows characters',
    ],
    'mobile' => [
        'required' => 'Mobile is required',
        'unique' => 'This email is singed previously',
        'already_existed' => 'This is email is already existed',
        'invalid' => 'Email is invalid',
        'valid' => 'Email is valid',
        'regex' => 'Invalid format email',
        'max' => 'Email has more than max characters',
        'min' => 'Email has min characters',
    ],
    'identity_number' => [
        'required' => 'Identity Number is required',
        'unique' => 'Identity Number previously existed',
        'already_existed' => 'Identity Number already existed',
        'invalid' => 'Invalid Identity Number',
        'valid' => 'Valid Identity Number',
        'regex' => 'Invalid Identity Number Format',
        'max' => 'You have more thank max characters, identity number has 10 characters',
        'min' => 'You have less than characters according to rolls',
        'numeric' => 'Identity Number must be a numeric'
    ],
    'job' => [
        'required' => 'Job is required',
        'rule' => [
            'in' => 'Job is not existed in the available list'
        ]
    ],
    'marital_status' => [
        'required' => 'Marital Status is required',
        'rule' => [
            'in' => 'Marital Status is not existed in the list',
        ]
    ],
    'city' => [
        'required' => 'City is required',
        'rule' => [
            'exists' => 'These city is not available, please choose another one',
        ]
    ],
    'birth_of_date_at' => [
        'required' => 'Birth Date is required',
        'date' => 'Must be date',
        'before' => 'Must be before input date',
        'after' => 'Must be after input date'
    ],
    'end_at' => [
        'required' => 'End Date is required',
        'date' => 'Must be date',
        'before' => 'Must be before input date',
        'after' => 'Must be after input date'
    ],
    'release_at' => [
        'required' => 'Release Date is required',
        'date' => 'Must be date',
        'before' => 'Must be before input date',
        'after' => 'Must be after input date'
    ],
    'kids' => [
        'required' => 'Please determine if you have kids or not',
        'boolean' => 'Invalid value',

    ],
    'banks' => [
        'required' => 'Bank is required',
        'iban_number' => 'Bank IBAN Number is required',
        'account_number' => 'Bank Account Number is required',
    ],

    'password' => [
        'required' => 'Password is required',
        'min' => 'Password tweak must be password greater than 6 charaters',
        'max' => 'password too long',
        'confirmed' => 'Password is not match'
    ],

    'company_name' => 'Company Name is required',
    'job_title' => [
        'required' => 'Job Title is required'
    ],
    'check_agree' => 'Agreeing to the terms and conditions'
];
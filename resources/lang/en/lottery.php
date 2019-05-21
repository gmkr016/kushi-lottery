<?php
/**
 * Translation use for lottery
 */
return [
    'page' => [
        'title' => 'Lottery'
    ],
    'head' => [
        'title_list' => 'Lottery List',
        'title' => 'Welcome to the Khushi Lottery',
        'description' => 'Feeling lucky today? Try your luck with us and you may have a chance to win exciting prices! What are you waiting for? Get your numbers and submit it to be included in our next raffle draw.'
    ],
    'instruction' => 'Please generate a number. Edit it if you desire other number. <b>Only number between :min-:max</b> will be accepted',
    'form' => [
        'cat_title' => '<b>Please Choose Category</b>',
        'title' => [
            'generated' => '<b>Generated Number</b>'
        ],
        'button' => [
            'generate' => [
                'title' => 'Generate Random Numbers',
                'name' => 'Generate'
            ],
            'confirm' => [
                'title' => 'Confirm Lottery Numbers',
                'name' => 'Confirm'
            ]
        ],
        'input' => [
            'firstNumber' => [
                'label' => '1st Number',
                'placeholder' => 'Number between (:min-:max)'
            ],
            'secondNumber' => [
                'label' => '2nd Number',
                'placeholder' => 'Number between (:min-:max)'
            ],
            'thirdNumber' => [
                'label' => '3rd Number',
                'placeholder' => 'Number between (:min-:max)'
            ],
            'fourthNumber' => [
                'label' => '4th Number',
                'placeholder' => 'Number between (:min-:max)'
            ],
            'fifthNumber' => [
                'label' => '5th Number',
                'placeholder' => 'Number between (:min-:max)'
            ],
            'sixthNumber' => [
                'label' => '6th Number',
                'placeholder' => 'Number between (:min-:max)'
            ],
        ]
    ],
    'success' => [
        'saved' => 'Your Lottery Numbers was successfully saved.'
    ],
    'error' => [
        'exists' => 'The numbers you specified was already submitted on :date'
    ],
    'validation' => [
        'required' => 'All fields are required.'
    ]
];

<?php 
return [
    'elasticsearch' =>  [

    ],
    'redis'         =>  [

    ],
    'exceptions'    =>  [
        [
            'class'     =>  \Pth\Exceptions\RedisException::class,
            'option'    =>  [
                'level' =>  '',
                'msg'   =>  ''
            ]
        ],
        [
            'class'     =>  \Pth\Exceptions\RedisException::class,
            'option'    =>  [
                'level' =>  '',
                'msg'   =>  ''
            ]
        ]

    ],
    'webhook'       =>  [

    ]
];
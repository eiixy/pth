<?php 
return [
    'elasticsearch' =>  [

    ],
    'redis'         =>  [
        'host'      =>  '',
        'port'      =>  ''
    ],
    /**
     * 异常
     */
    'exceptions'    =>  [
        [
            'class'     =>  \Pth\Exceptions\RedisException::class,
            'option'    =>  [
                'msg'   =>  '',
                'code' =>  '',
                'level' =>  '',
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
    /**
     * 消息通知
     */
    'notifications' =>  [
        'dingtalk'       =>  [
            'webhook'  =>  'https://oapi.dingtalk.com/robot/send?access_token=xxxxxxxx'
        ],
        'email'  =>  [
            ''  =>  ''
        ]
    ]
];
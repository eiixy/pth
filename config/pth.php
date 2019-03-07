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
            'webhook'   =>  'https://oapi.dingtalk.com/robot/send?access_token=b092e8ceca15df5d16818e9ddad5fbe40eaab2dae78a984f5ad0a5460bf12c82',
            'msgtype'   =>  'markdown',
            'at'        =>  [
                'atMobiles' =>  [

                ],
                'isAtAll'   => false
            ]
        ],
        'email'  =>  [
            ''  =>  ''
        ]
    ]
];
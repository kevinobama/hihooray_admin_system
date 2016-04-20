<?php if(Yii::$app->user->isGuest==false) { ?>
<aside class="main-sidebar">
    <section class="sidebar">
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [                 
                    ['label' => '控制面板', 'icon' => 'fa fa-dashboard', 'url' => ['/site/index']],
                    ['label' => '用户控制', 'icon' => 'fa fa-dashboard', 'url' => ['#'],
                        'items' => [
                            ['label' => '学生管理', 'icon' => 'fa fa-file-code-o', 'url' => ['/students/index'],],
                            ['label' => '老师管理', 'icon' => 'fa fa-file-code-o', 'url' => ['/teachers/index'],],
                            ['label' => '管理员管理', 'icon' => 'fa fa-file-code-o', 'url' => ['/users/index'],],
                            ['label' => '权限管理', 'icon' => 'fa fa-dashboard', 'url' => ['/students/index'],],
                        ],                     
                    ],
                    ['label' => '软件管理', 'icon' => 'fa fa-dashboard', 'url' => ['#'],
                        'items' => [
                            ['label' => '学生版本发布', 'icon' => 'fa fa-file-code-o', 'url' => ['/student-versions/index'],],
                            ['label' => '学生版本杳看', 'icon' => 'fa fa-file-code-o', 'url' => ['/student-versions/index'],],
                            ['label' => '手机版本发布', 'icon' => 'fa fa-file-code-o', 'url' => ['/student-versions/index'],],
                            ['label' => '手机版本杳看', 'icon' => 'fa fa-file-code-o', 'url' => ['/student-versions/index'],],
                            ['label' => '老师版本发布', 'icon' => 'fa fa-file-code-o', 'url' => ['/student-versions/index'],],
                            ['label' => '老师版本杳看', 'icon' => 'fa fa-dashboard', 'url' => ['/student-versions/index'],],
                        ],                      
                    ],
                    ['label' => '问题管理', 'icon' => 'fa fa-dashboard', 'url' => ['#'],
                        'items' => [
                            ['label' => '问题管理', 'icon' => 'fa fa-file-code-o', 'url' => ['/questions/index'],],
                        ],                     
                    ],
                    ['label' => '教师管理', 'icon' => 'fa fa-dashboard', 'url' => ['#'],
                        'items' => [
                            ['label' => '身份认证', 'icon' => 'fa fa-file-code-o', 'url' => ['/teacher-verify-idcards/index'],],
                            ['label' => '开源认证', 'icon' => 'fa fa-dashboard', 'url' => ['/teacher-verify-teaching/index'],],
                            ['label' => '资质认证', 'icon' => 'fa fa-dashboard', 'url' => ['/teacher-verify-info/index'],],
                            ['label' => '考试认证', 'icon' => 'fa fa-dashboard', 'url' => ['/teacher-exam-authority-verify/index'],],                                                        
                        ], 
                    ],
                    ['label' => '提现管理', 'icon' => 'fa fa-dashboard', 'url' => ['#'],
                        'items' => [
                            ['label' => '银行管理', 'icon' => 'fa fa-file-code-o', 'url' => ['/11'],],
                            ['label' => '提现申请管理', 'icon' => 'fa fa-dashboard', 'url' => ['/22'],],                                                       
                        ],                     
                    ],
                    ['label' => '微课管理', 'icon' => 'fa fa-dashboard', 'url' => ['#'],
                        'items' => [
                            ['label' => '微课管理', 'icon' => 'fa fa-file-code-o', 'url' => ['/micro-courses/index'],],
                            ['label' => '订购管理', 'icon' => 'fa fa-dashboard', 'url' => ['/micro-courses/index'],],                                                       
                        ],                     
                    ],
                    ['label' => '积分勋章', 'icon' => 'fa fa-dashboard', 'url' => ['#'],
                        'items' => [
                            ['label' => '积分管理', 'icon' => 'fa fa-file-code-o', 'url' => ['/points/index'],],
                            ['label' => '勋章管理', 'icon' => 'fa fa-file-code-o', 'url' => ['/11'],],
                            ['label' => '等级管理', 'icon' => 'fa fa-dashboard', 'url' => ['/22'],],
                        ],                     
                    ],
                    ['label' => '推送消息', 'icon' => 'fa fa-dashboard', 'url' => ['#'],
                        'items' => [
                            ['label' => '发送消息', 'icon' => 'fa fa-file-code-o', 'url' => ['/passport-messages/index'],],
                            ['label' => '历史管理', 'icon' => 'fa fa-dashboard', 'url' => ['/passport-messages/index'],],                                                       
                        ],                     
                    ],
                    ['label' => '哇哇豆管理', 'icon' => 'fa fa-dashboard', 'url' => ['#'],
                        'items' => [
                            ['label' => '操作哇哇豆', 'icon' => 'fa fa-file-code-o', 'url' => ['/coins/index'],],                                                                                   
                        ],                    
                    ],					                    
                    [
                        'label' => 'development tools',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                            ['label' => 'admin list', 'icon' => 'fa fa-file-code-o', 'url' => ['/user/admin/index'],],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>
</aside>
<?php } ?>

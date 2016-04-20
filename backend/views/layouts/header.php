<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">&nbsp;</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a  class="dropdown-toggle" >                        
                        <span class="hidden-xs">Keivn Gates</span>
                    </a>                    
                </li>                
                <li class="dropdown user user-menu">
                    <a href="/site/logout" class="dropdown-toggle" data-method="post">                        
                        <span class="hidden-xs">Log out</span>
                    </a>                    
                </li>
                <li class="dropdown user user-menu">
                    <a  class="dropdown-toggle" >                        
                        
                    </a>                   
                </li>
            </ul>
        </div>
    </nav>
</header>

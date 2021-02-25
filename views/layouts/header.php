<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">' . Yii::$app->name . '</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">



                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image" />
                        <span class="hidden-xs">
                            <?php
                            if (isset(Yii::$app->user->identity->nombre) != null) {
                                echo Yii::$app->user->identity->nombre;
                            } else {
                                echo "Desconocido";
                            }
                            ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image" />

                            <p>
                                <?php
                                if (isset(Yii::$app->user->identity->nombre) != null) {
                                    echo Yii::$app->user->identity->nombre . ' - ' . Yii::$app->user->identity->TipoUser;
                                } else {
                                    echo "Desconocido";
                                }
                                ?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <?php
                                if (Yii::$app->user->isGuest) {
                                    echo Html::a(
                                        'Iniciar Sesion',
                                        ['/site/login'],
                                        ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                    );
                                } else {
                                    echo Html::a(
                                        'Cerrar Sesion',
                                        ['/site/logout'],
                                        ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                    );
                                } ?>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
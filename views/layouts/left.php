<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>
                    <?php
                    if (isset(Yii::$app->user->identity->nombre) != null) {
                        echo Yii::$app->user->identity->nombre;
                    } else {
                        echo "Desconocido";
                    }
                    ?>
                </p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..." />
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    ['label' => 'Contenidos', 'options' => ['class' => 'header']],
                    ['label' => 'Noticias', 'icon' => 'file-code-o', 'url' => ['/noticias/index']],
                    ['label' => 'Videos', 'icon' => 'dashboard', 'url' => ['/videos/index']],
                    ['label' => 'Juegos', 'icon' => 'dashboard', 'url' => ['/juegos/index']],
                    ['label' => 'Torneos', 'icon' => 'dashboard', 'url' => ['/torneos/index']],
                    [
                        'label' => 'Foro',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Hilos', 'icon' => 'share', 'url' => ['/entradas/index']],
                            ['label' => 'Comentarios', 'icon' => 'share', 'url' => ['/comentarios/index']]
                        ],
                    ],
                    ['label' => 'Sugerencias', 'url' => ['/sugerencias/index'], 'hidden' => Yii::$app->user->isGuest],
                    ['label' => 'Administrar Usuarios', 'url' => ['/usuarios/index'], 'hidden' => Yii::$app->user->isGuest],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    // [
                    //     'label' => 'Some tools',
                    //     'icon' => 'share',
                    //     'url' => '#',
                    //     'items' => [
                    //         ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                    //         ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                    //         [
                    //             'label' => 'Level One',
                    //             'icon' => 'circle-o',
                    //             'url' => '#',
                    //             'items' => [
                    //                 ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                    //                 [
                    //                     'label' => 'Level Two',
                    //                     'icon' => 'circle-o',
                    //                     'url' => '#',
                    //                     'items' => [
                    //                         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                    //                         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                    //                     ],
                    //                 ],
                    //             ],
                    //         ],
                    //     ],
                    // ],
                ],
            ]
        ) ?>

    </section>

</aside>
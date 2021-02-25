<?php

/**
 * @author Juan Sanz
*/

// Helpers y Widgets de Yii
use yii\helpers\Html;
use yii\widgets\ListView;

$dataProvider->pagination = array('pageSize' => 2);

/* @var $this yii\web\View */
/* @var $searchModel app\models\EntradasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Entradas');
?>

<div class="entradas-index">
    <p>
        <?= Html::a(Yii::t('app', 'Crear Entradas'), ['create'], ['class' => 'btn btn-success']) ?>

        <?php echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item'],
            'summary' => '',
            'itemView' => function ($model, $key, $index, $widget) {
                return $this->render('_entrada', ['model' => $model]);
                //return Html::a(Html::encode($model->id), ['view', 'id' => $model->id]);
            },
        ]) ?>

    </p>
</div>
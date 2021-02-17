<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sugerencias".
 *
 * @property int $id
 * @property int $autor_id
 * @property string $comentario
 *
 * @property Entradas[] $entradas
 * @property Juegos[] $juegos
 * @property Usuarios $autor
 * @property Torneos[] $torneos
 * @property Usuarios[] $usuarios
 * @property Videos[] $videos
 */
class Sugerencias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sugerencias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['autor_id', 'comentario'], 'required'],
            [['autor_id'], 'integer'],
            [['comentario'], 'string'],
            [['autor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['autor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'autor_id' => Yii::t('app', 'Autor ID'),
            'comentario' => Yii::t('app', 'Comentario'),
        ];
    }

    /**
     * Gets query for [[Autor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutor()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'autor_id']);
    }
}

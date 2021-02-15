<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "noticias".
 *
 * @property int $id
 * @property int $autor_id
 * @property int $entradas_id
 * @property string $titulo
 * @property string $descripcion
 * @property string $texto
 * @property string $imagen
 * @property string $fecha
 *
 * @property Usuarios $autor
 * @property Entradas $entradas
 */
class Noticias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'noticias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['autor_id', 'entradas_id', 'titulo', 'descripcion', 'texto', 'imagen'], 'required'],
            [['autor_id', 'entradas_id'], 'integer'],
            [['titulo', 'descripcion', 'texto', 'imagen'], 'string'],
            [['fecha'], 'safe'],
            [['autor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['autor_id' => 'id']],
            [['entradas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Entradas::className(), 'targetAttribute' => ['entradas_id' => 'id']],
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
            'entradas_id' => Yii::t('app', 'Entradas ID'),
            'titulo' => Yii::t('app', 'Titulo'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'texto' => Yii::t('app', 'Texto'),
            'imagen' => Yii::t('app', 'Imagen'),
            'fecha' => Yii::t('app', 'Fecha'),
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

    /**
     * Gets query for [[Entradas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasOne(Entradas::className(), ['id' => 'entradas_id']);
    }
}
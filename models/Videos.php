<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "videos".
 *
 * @property int $id
 * @property int $categoria_id
 * @property string $video
 * @property int|null $usuarios_id
 * @property string $descripcion
 * @property string $titulo
 *
 * @property Usuarios $usuarios
 * @property Categorias $categoria
 * 
 * @author Marta Pretel
 */

class Videos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'videos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuarios_id', 'categoria_id', 'video', 'descripcion', 'titulo'], 'required'],
            [['categoria_id', 'usuarios_id'], 'integer'],
            [['video', 'descripcion'], 'string'],
            [['titulo'], 'string', 'max' => 50],
            [['usuarios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuarios_id' => 'id']],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::className(), 'targetAttribute' => ['categoria_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'categoria_id' => Yii::t('app', 'Categorias'),
            'video' => Yii::t('app', 'Video'),
            'usuarios_id' => Yii::t('app', 'Nombre del Autor'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'titulo' => Yii::t('app', 'Titulo'),
            'CategoriaNombre' => Yii::t('app', 'Categoria'),
            'Creador' => Yii::t('app', 'Creador'),
        ];
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuarios_id']);
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categorias::className(), ['id' => 'categoria_id']);
    }

    public function getCreador()
    {
        $mostrado = $this->usuarios->nombre;
        if ($this->usuarios->getEstado() == "Aceptado") {
            $mostrado;
        } else {
            $mostrado = "Undefined";
        }
        return $mostrado;
    }

    public function getCategoriaNombre()
    {
        return $this->categoria->categoria;
    }

    public function fields()
    {
        return array_merge(parent::fields(), ['Creador', 'CategoriaNombre']);
    }
}

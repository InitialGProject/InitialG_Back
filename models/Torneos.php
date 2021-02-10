<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "torneos".
 *
 * @property int $id
 * @property int $categorias_id
 * @property int $usuario_id
 * @property string $titulo
 * @property string $imagen
 * @property string $descripcion
 * @property string $fechaInicio
 * @property string $fechaFin
 * @property int $entrada_id
 *
 * @property Participantestorneos[] $participantestorneos
 * @property Categorias $categorias
 * @property Entradas $entrada
 * @property Usuarios $usuario
 */
class Torneos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'torneos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categorias_id', 'usuario_id', 'titulo', 'imagen', 'descripcion', 'fechaInicio', 'fechaFin', 'entrada_id'], 'required'],
            [['categorias_id', 'usuario_id', 'entrada_id'], 'integer'],
            [['imagen', 'descripcion'], 'string'],
            [['fechaInicio', 'fechaFin'], 'safe'],
            [['titulo'], 'string', 'max' => 50],
            [['categorias_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::className(), 'targetAttribute' => ['categorias_id' => 'id']],
            [['entrada_id'], 'exist', 'skipOnError' => true, 'targetClass' => Entradas::className(), 'targetAttribute' => ['entrada_id' => 'id']],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuario_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'categorias_id' => Yii::t('app', 'Categorias ID'),
            'usuario_id' => Yii::t('app', 'Usuario ID'),
            'titulo' => Yii::t('app', 'Titulo'),
            'imagen' => Yii::t('app', 'Imagen'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'fechaInicio' => Yii::t('app', 'Fecha Inicio'),
            'fechaFin' => Yii::t('app', 'Fecha Fin'),
            'entrada_id' => Yii::t('app', 'Entrada ID'),
        ];
    }

    /**
     * Gets query for [[Participantestorneos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParticipantestorneos()
    {
        return $this->hasMany(Participantestorneos::className(), ['torneos_id' => 'id']);
    }

    /**
     * Gets query for [[Categorias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategorias()
    {
        return $this->hasOne(Categorias::className(), ['id' => 'categorias_id']);
    }

    /**
     * Gets query for [[Entrada]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntrada()
    {
        return $this->hasOne(Entradas::className(), ['id' => 'entrada_id']);
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuario_id']);
    }

    public function getCreador()
    {
        return $this->usuario->nombre;
    }

    public function getCategoria()
    {
        return $this->categorias->categoria;
    }

    public function fields()
    {
        return array_merge(parent::fields(), ['creador', 'Categoria']);
    }
}

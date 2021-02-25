<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entradas".
 *
 * @property int $id
 * @property int $usuario_id
 * @property int $juego_id
 * @property string $titulo
 * @property string $creado
 * @property string $contenido
 * @property int $categorias_id
 * @property string $estado
 *
 * @property Comentarios[] $comentarios
 * @property Categorias $categorias
 * @property Usuarios $usuario
 * @property Juegos $juego
 * @property Noticias[] $noticias
 * @property Torneos[] $torneos
 * 
 * @author Juan Sanz
 */

class Entradas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'entradas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuario_id', 'juego_id', 'titulo', 'creado', 'contenido', 'categorias_id'], 'required'],
            [['usuario_id', 'juego_id', 'categorias_id'], 'integer'],
            [['creado'], 'safe'],
            [['contenido'], 'string'],
            [['titulo'], 'string', 'max' => 50],
            [['estado'], 'string', 'max' => 1],
            [['categorias_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::className(), 'targetAttribute' => ['categorias_id' => 'id']],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuario_id' => 'id']],
            [['juego_id'], 'exist', 'skipOnError' => true, 'targetClass' => Juegos::className(), 'targetAttribute' => ['juego_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'usuario_id' => Yii::t('app', 'Creador'),
            'juego_id' => Yii::t('app', 'Juego Relacionado'),
            'titulo' => Yii::t('app', 'Titulo'),
            'creado' => Yii::t('app', 'Fecha y Hora de Publicacion'),
            'contenido' => Yii::t('app', 'Contenido'),
            'categorias_id' => Yii::t('app', 'Categorias'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * Gets query for [[Comentarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentarios::className(), ['entradas_id' => 'id']);
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
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['id' => 'usuario_id']);
    }

    /**
     * Gets query for [[Juego]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJuego()
    {
        return $this->hasOne(Juegos::className(), ['id' => 'juego_id']);
    }

    /**
     * Gets query for [[Noticias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNoticias()
    {
        return $this->hasMany(Noticias::className(), ['entradas_id' => 'id']);
    }

    /**
     * Gets query for [[Torneos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTorneos()
    {
        return $this->hasMany(Torneos::className(), ['entrada_id' => 'id']);
    }

    public function getEstado()
    {
        $estado = $this->estado;

        if ($estado == 'A') {
            $estado = 'Aceptado';
        } else {
            $estado = 'Denegado';
        }

        return $estado;
    }

    public function getJuegoRelacionado()
    {
        return $this->juego->titulo;
    }

    public function getCreador()
    {
        return $this->usuario->nombre;
    }

    public function getCategoria()
    {
        return $this->categorias->categoria;
    }

    public function getfechaPublicacion()
    {
        return \Yii::$app->formatter->asDateTime($this->creado);
    }

    public function fields()
    {
        return array_merge(parent::fields(), ['Estado', 'creador', 'Categoria', 'JuegoRelacionado', 'fechaPublicacion']);
    }
}

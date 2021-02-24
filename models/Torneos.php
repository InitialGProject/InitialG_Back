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
 * 
 * @author Juan Sanz
 */

class Torneos extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;


    public function upload()
    {
        if ($this->validate()) {
            $this->imagen = $this->imageFile->baseName . '.' . $this->imageFile->extension;
            // $this->imageFile->saveAs('uploads/' .$this->imagen);

            return true;
        } else {
            return false;
        }
    }

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
            [['categorias_id', 'titulo', 'imagen', 'descripcion', 'fechaInicio', 'fechaFin'], 'required'],
            [['categorias_id', 'usuario_id', 'entrada_id', 'participantes_id'], 'integer'],
            [['imagen', 'descripcion', 'estado'], 'string'],
            [['fechaInicio', 'fechaFin'], 'safe'],
            [['titulo'], 'string', 'max' => 50],
            [['categorias_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::className(), 'targetAttribute' => ['categorias_id' => 'id']],
            [['entrada_id'], 'exist', 'skipOnError' => true, 'targetClass' => Entradas::className(), 'targetAttribute' => ['entrada_id' => 'id']],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['usuario_id' => 'id']],
            [['participantes_id'], 'exist', 'skipOnError' => true, 'targetClass' => Participantestorneos::className(), 'targetAttribute' => ['participantes_id' => 'id']],

            //subir foto
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'categorias_id' => Yii::t('app', 'Categorias'),
            'usuario_id' => Yii::t('app', 'Nombre de Usuario'),
            'titulo' => Yii::t('app', 'Titulo'),
            'imagen' => Yii::t('app', 'Url de la Imagen'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'estado' => Yii::t('app', 'Estado del Torneo'),
            'Estado' => Yii::t('app', 'Estado del Torneo'),
            'Numparticipantes' => Yii::t('app', 'Numero de Participantes'),
            'fechaInicio' => Yii::t('app', 'Inicio del Torneo'),
            'fechaFin' => Yii::t('app', 'Fin del Torneo'),
            'entrada_id' => Yii::t('app', 'Entradas del Foro'),
            'participantes_id' => Yii::t('app', 'Numero de Participantes'),
        ];
    }

    /**
     * Gets query for [[Participantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParticipantes()
    {
        return $this->hasOne(Participantestorneos::className(), ['id' => 'participantes_id']);
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

    public function getEstado()
    {
        $estado = $this->estado;

        if ($estado == 'C') {
            $estado = 'En Curso';
        } else {
            $estado = 'Finalizado';
        }

        return $estado;
    }

    public function getNumparticipantes()
    {
        $estado = $this->estado;

        if ($this->getEstado() == 'En Curso') {
            return $this->participantes->numeroParticipantes;
        } else {
            return '-';
        }
    }

    public function getCreador()
    {
        return $this->usuario->nombre;
    }

    public function getCategoria()
    {
        return $this->categorias->categoria;
    }

    public function getfechaInicioTorneo()
    {
        return \Yii::$app->formatter->asDateTime($this->fechaInicio);
    }

    public function getfechaFinTorneo()
    {
        return \Yii::$app->formatter->asDateTime($this->fechaFin);
    }

    public function fields()
    {
        return array_merge(parent::fields(), ['Estado', 'Numparticipantes', 'creador', 'Categoria', 'fechaInicio', 'fechaFin']);
    }
}

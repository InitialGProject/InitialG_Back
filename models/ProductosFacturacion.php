<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productos_facturacion".
 *
 * @property int $id
 * @property int $id_usuario
 * @property string $fecha_compra
 * @property int $enviado
 * @property string|null $fecha_envio
 * @property int|null $total
 *
 * @property ProductosFactura[] $productosFacturas
 * @property Usuarios $usuario
 */
class ProductosFacturacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos_facturacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_usuario','total', 'direccion', 'pais', 'cp', 'provincia'], 'required'],
            [['id_usuario', 'enviado', 'cp'], 'integer'],
            [['fecha_compra', 'fecha_envio'], 'safe'],
            [['total', 'total_si'], 'number'],
            [['direccion', 'pais', 'provincia'], 'string'],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::class, 'targetAttribute' => ['id_usuario' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_usuario' => Yii::t('app', 'Id Usuario'),
            'fecha_compra' => Yii::t('app', 'Fecha Compra'),
            'enviado' => Yii::t('app', 'Enviado'),
            'direccion' => Yii::t('app', 'Direccion'),
            'pais' => Yii::t('app', 'Pais'),
            'cp' => Yii::t('app', 'CP'),
            'fecha_envio' => Yii::t('app', 'Fecha Envio'),
            'total' => Yii::t('app', 'Total'),
            'total_si' => Yii::t('app', 'Total Sin IVA'),
        ];
    }

    /**
     * Gets query for [[ProductosFacturas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductosFacturas()
    {
        return $this->hasMany(ProductosFactura::class, ['id_facturacion' => 'id']);
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::class, ['id' => 'id_usuario']);
    }

    public static function Activo($data){
        if($data=='0'){
            return "No";
        }else{
            return "Si";
        }
    }
}

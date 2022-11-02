<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%detalle}}".
 *
 * @property int $num_detalle
 * @property int $id_factura
 * @property int $id_producto
 * @property int $cantidad
 * @property float $precio
 *
 * @property Factura $factura
 * @property Producto $producto
 */
class Detalle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%detalle}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_factura', 'id_producto', 'cantidad', 'precio'], 'required'],
            [['id_factura', 'id_producto', 'cantidad'], 'integer'],
            [['precio'], 'number'],
            [['id_producto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::class, 'targetAttribute' => ['id_producto' => 'id_producto']],
            [['id_factura'], 'exist', 'skipOnError' => true, 'targetClass' => Factura::class, 'targetAttribute' => ['id_factura' => 'num_factura']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'num_detalle' => 'Num Detalle',
            'id_factura' => 'Id Factura',
            'id_producto' => 'Id Producto',
            'cantidad' => 'Cantidad',
            'precio' => 'Precio',
        ];
    }

    /**
     * Gets query for [[Factura]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFactura()
    {
        return $this->hasOne(Factura::class, ['num_factura' => 'id_factura']);
    }

    /**
     * Gets query for [[Producto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Producto::class, ['id_producto' => 'id_producto']);
    }
}

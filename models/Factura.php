<?php

namespace app\models;

use Yii;

use app\models\Cliente;

/**
 * This is the model class for table "{{%factura}}".
 *
 * @property int $num_factura
 * @property int $id_cliente
 * @property string $fecha
 *
 * @property Cliente $cliente
 * @property Detalle[] $detalles
 */
class Factura extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%factura}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cliente', 'fecha'], 'required'],
            [['id_cliente'], 'integer'],
            [['fecha'], 'safe'],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::class, 'targetAttribute' => ['id_cliente' => 'id_cliente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'num_factura' => 'Num Factura',
            'id_cliente' => 'Id Cliente',
            'fecha' => 'Fecha',
        ];
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::class, ['id_cliente' => 'id_cliente']);
    }

    /**
     * Gets query for [[Detalles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalles()
    {
        return $this->hasMany(Detalle::class, ['id_factura' => 'num_factura']);
    }
     
    public function getDetalle()
    {
        return $this->hasOne(Detalle::class, ['id_factura' => 'num_factura']);
    }
     

}

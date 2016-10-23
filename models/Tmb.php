<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tmb".
 *
 * @property integer $id
 * @property string $name
 * @property integer $amp_id
 * @property integer $chw_id
 */
class Tmb extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tmb';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amp_id', 'chw_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ตำบล',
            'amp_id' => 'อำเภอ',
            'chw_id' => 'จังหวัด',
        ];
    }
    public function getAmptmb(){
        return $this->hasOne(Amp::className(), ['id'=>'amp_id']);
    }
    
}

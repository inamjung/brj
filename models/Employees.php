<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property integer $id
 * @property string $name
 * @property string $bd
 * @property string $blood
 * @property string $cid
 * @property string $ex
 * @property string $sex
 * @property string $addr
 * @property string $tel
 * @property string $social
 * @property integer $status
 * @property string $marry
 * @property integer $tmb_id
 * @property integer $amp_id
 * @property integer $chw_id
 */
class Employees extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bd','ex','social'], 'safe'],
            [['sex', 'addr'], 'string'],
            [['status', 'tmb_id', 'amp_id', 'chw_id'], 'integer'],
            [['name', 'tel','marry'], 'string', 'max' => 255],
            [['blood'], 'string', 'max' => 2],
            [['cid'], 'string', 'max' => 13],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ชื่อ-สกุล',
            'bd' => 'วันเกิด',
            'blood' => 'หมู่เลือด',
            'cid' => 'CID',
            'ex' => 'ประสบการณ์',
            'sex' => 'เพศ',
            'addr' => 'ที่อยู่',
            'tel' => 'Tel',
            'social' => 'Social',
            'status' => 'สถานะ',
            'marry' => 'สถานภาพ',
            'tmb_id' => 'ตำบล',
            'amp_id' => 'อำเภอ',
            'chw_id' => 'จังหวัด',
        ];
    }
    public function getArray($value) {
        return explode(',', $value);
    }
    public function setToArray($value) {
        return is_array($value) ? implode(',', $value) : NULL;
    }
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            if (!empty($this->ex)) {
                $this->ex = $this->setToArray($this->ex);
                $this->social = $this->setToArray($this->social);
               
                
            }
            return true;
        } else {
            return false;
        }
                
    }
    public static function itemAlias($type, $code = NULL) {
        $_items = array(
            'blood'=> array(
                'a' => 'A',
                'b' => 'B',
                'o' => 'O',
                'ab' => 'AB',
                '9'=>'ไม่ทราบ'
            ),
            'ex' => array(
                'php' => 'PHP',
                'yii' => 'YII',
                'access'=>'Access'
            ),
            'social' => array(
                'fb' => 'FaceBook',
                'line' => 'Line',
                'google' => 'GooglePlus',
                'msn' => 'MSN',
                
            ),
        );
        if (isset($code)) {
            return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
        } else {
            return isset($_items[$type]) ? $_items[$type] : false;
        }
    }
}

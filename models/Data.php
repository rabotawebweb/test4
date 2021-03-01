<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class Data extends ActiveRecord
{
	static public function get_years() {
		
		Yii::$app->db->createCommand("SET lc_time_names = 'ru_UA'")->execute();
		
		$sql = "SELECT date_format(date, '%Y') as year, date_format(date, '%M') as mouth, COUNT(id) as count FROM  data  GROUP BY date_format(date, '%Y-%m') ";
		$quers = Yii::$app->db->createCommand($sql)->queryAll();
	
		return array_reverse($quers);
	}
	
	
}
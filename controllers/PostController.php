<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Data;
use Yii;

class PostController extends Controller
{

	 public function actionIndex(){
		 
		 $request = Yii::$app->request;
		 $card_number = (int) $request->get('card_number', 0); 
		 $card_year = (int) $request->get('card_year', 0); 
		 $card_mouth = (int) $request->get('card_mouth', 0); 
		 
		 //var_dump($card_number);
		 
		//$posts = Data::find()->asArray()->all();
		
		
		$posts = Data::find();
		if($card_number != 0) $posts->where(['card_number' => $card_number]);
		if($card_year != 0) $posts->andWhere(['YEAR(date)' => $card_year]);
		if($card_mouth != 0) $posts->andWhere(['MONTH(date)' => $card_mouth]);
		$posts = $posts->asArray()->all();

		
		$quers = Data::get_years();
		
        return $this->render('index', compact('posts', 'quers'));
	 }
 
}
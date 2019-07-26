<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/26 0026
 * Time: 14:26
 */

namespace app\controllers;


use yii\web\Controller;

class DefaultController extends Controller
{
	public function actionIndex(){
		$this->layout = false;
		return $this->render('index');
	}
}
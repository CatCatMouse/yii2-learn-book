<?php
namespace app\common\components;
use yii\web\Controller;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/26 0026
 * Time: 17:18
 * 集成常用公共方法 提供给所有的Controller使用
 * get, post, setCookie, getCookie, removeCookie, renderJson
 */
class BaseWebController extends Controller
{
	public $enableCsrfValidation = false;//关闭CSRF

	//获取http的get参数
	public function get( $key ,$default_val = '' ){
		return \Yii::$app->request->get( $key,$default_val );
	}

	//获取http的post参数
	public function post( $key ,$default_val = '' ){
		return \Yii::$app->request->post( $key,$default_val );
	}

	//设置cookie
	public function setCookie( $name,$value,$expire = 0 ){
		$cookies = \Yii::$app->response->cookies;
		$cookies->add( new \yii\web\Cookie( [
			'name' => $name,
			'value' => $value,
			'expire' => $expire
		] ) );
	}

	//获取cookie
	public function getCookie( $name,$default_value = '' ){
		$cookies = \Yii::$app->response->cookies;
		return $cookies->getValue( $name,$default_value );
	}

	//删除cookies
	public function removeCookie( $name ){
		$cookies = \Yii::$app->response->cookies;
		$cookies->remove( $name );
	}

	//api统一返回json格式方法
	public function renderJson( $data = [] ,$msg = 'ok' ,$code = 200 ){
		header( "Content-type: application/json" );
		echo json_encode( [
			'code' => $code,
			'msg' => $msg,
			'data' => $data,
			'req_id' => uniqid()
		] );
	}
}
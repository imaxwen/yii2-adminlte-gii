<?php
namespace maxwen\gii\controllers;

use Yii;
use yii\gii\controllers\DefaultController as GiiController;

/**
 * 集成Gii默认控制器
 * @author Max.wen
 */
class DefaultController extends GiiController
{
	/**
	 * @return string
	 */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
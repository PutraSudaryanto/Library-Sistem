<?php
/**
 * ForgotController
 * @var $this ForgotController
 * version: 1.3.0
 * Reference start
 *
 * TOC :
 *	Index
 *
 *	LoadModel
 *	performAjaxValidation
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2012 Ommu Platform (opensource.ommu.co)
 * @link https://github.com/ommu/core
 * @contact (+62)856-299-4114
 *
 *----------------------------------------------------------------------------------------------------------
 */

class ForgotController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * Initialize public template
	 */
	public function init() 
	{
		$arrThemes = Utility::getCurrentTemplate('public');
		Yii::app()->theme = $arrThemes['folder'];
		$this->layout = $arrThemes['layout'];
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() 
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','password','username'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	/**
	 * Displays the login page
	 */
	public function actionIndex()
	{
		$this->redirect(array('password'));
	}
	
	/**
	 * Displays the login page
	 */
	public function actionPassword()
	{
		$this->pageTitle = Yii::t('phrase', 'Forgot Password');
		$this->pageDescription = '';
		$this->pageMeta = '';
		$this->render('front_password');
	}
	
	/**
	 * Displays the login page
	 */
	public function actionUsername()
	{
		$this->pageTitle = Yii::t('phrase', 'Forgot Username');
		$this->pageDescription = '';
		$this->pageMeta = '';
		$this->render('front_username');
	}
}
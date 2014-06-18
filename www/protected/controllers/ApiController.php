<?php

class ApiController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
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
                'actions'=>array('video','categories','view'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','update'),
                'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete'),
                'users'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }


    /**
     * Lists all video.
     */
    public function actionVideo()
    {
        $md5 = "372d74ec3935e9418b5b7187cd471f65";
        $cate_id = $_GET['cate_id'];

        if($md5 == $_GET['md5']){
            if($_GET['app_id'] == 1){

                if(isset($_GET['lmit'])){
                    $limit = $_GET['lmit'];
                }else{
                    $limit = 10;
                }

                if(isset($_GET['offset'])){
                    $offset = $_GET['offset'];
                }else{
                    $offset = 0;
                }

                $criteria = new CDbCriteria(array(
                    'limit' => $limit,
                    'offset' => $offset,
                    'condition' => 'cate =:cate_id',
                    'params' => array(':cate_id'=>$cate_id)
                ));
                $videos = Video::model()->findAll($criteria);
                foreach($videos as $i=>$video) {
                    echo CJSON::encode($video);
                }
            }else{
                echo CJSON::encode('Sai app id');
            }
        }else{
            echo CJSON::encode('Sai ma bao mat');
        }
    }

    /**
     * Lists all cat.
     */
    public function actionCategories()
    {
        $md5 = "372d74ec3935e9418b5b7187cd471f65";
        if($md5 == $_GET['md5']){
            if($_GET['app_id'] == 1){

                $criteria = new CDbCriteria();
                $cats = Categories::model()->findAll($criteria);
                foreach($cats as $i=>$cat) {
                    echo CJSON::encode($cat);
                }
            }else{
                echo CJSON::encode('Sai app id');
            }
        }else{
            echo CJSON::encode('Sai ma bao mat');
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new Categories('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Categories']))
            $model->attributes=$_GET['Categories'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Categories the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Categories::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Categories $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='categories-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}

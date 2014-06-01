<?php

class GoodsController extends Controller
{
    public $categoryArray='';

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
                'actions'=>array('index','view'),
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
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function pictureValidate($val)
    {
        move_uploaded_file($val['tmp_name'], "./picmax/".basename($val['name']));
        $filename = $val['name'];
        $fileway = "./picmax/".$val['name'];


        $height = 208;
        $width = 190;

        list($width_old, $height_old) = getimagesize($fileway);
        $w_v = $width / $width_old;
        $h_v = $height / $height_old;
        $padding_w = 0;
        $padding_h = 0;
        if($w_v>$h_v){
            $new_width = $width_old * $h_v;
            $padding_w = ($width - $new_width) / 2;
            $new_height = $height;

        }else{
            $new_height = $height_old * $w_v;
            $padding_h = ($height - $new_height) / 2;
            $new_width = $width;
        }


        $image_p = imagecreatetruecolor($width, $height);
        $color = imagecolorallocate($image_p, 255, 255, 255);
        imagefill($image_p, 0, 0, $color);
        $image = imagecreatefromjpeg($fileway);
        imagecopyresampled($image_p, $image, $padding_w, $padding_h, 0, 0, $new_width, $new_height, $width_old, $height_old);
        imagejpeg($image_p, "./pic/".$filename, 100);
    }

    public function actionCreate()
    {
        $model=new Goods;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Goods']))
        {
            $_POST['Goods']['date']=date("Y-m-d H:i:s");
            $draft = $_POST['Goods']['draft'];
            if($draft =='В Черновик'){
                $_POST['Goods']['draft']=0;
            }else{
                $_POST['Goods']['draft']=1;
            }
			$_POST['Goods']['pic_min'] = $_FILES['pic_min']['name'];
            $_POST['Goods']['pic_full'] = $_FILES['pic_min']['name'];
            $picture = $_FILES['pic_min'];
            if($picture['name']) {
                $this->pictureValidate($picture);
            }

            $model->attributes=$_POST['Goods'];
            $model->attr = $_POST['Goods'];

            if($model->save())
                 $this->redirect(array('view','id'=>$model->id));
        }
        $this->categoryArray = Produser::model()->findAll();
        $this->render('create',array(
            'model'=>$model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Goods']))
        {   $_POST['Goods']['date']=date("Y-m-d H:i:s");
            $draft = $_POST['Goods']['draft'];
            if($draft =='В Черновик'){
                $_POST['Goods']['draft']=0;
            }else{
                $_POST['Goods']['draft']=1;
            }
            $_POST['Goods']['pic_min'] = $_FILES['pic_min']['name'];
            if($_POST['Goods']['pic_min']!='') {
                $_POST['Goods']['pic_full'] = $_FILES['pic_min']['name'];
                $picture = $_FILES['pic_min'];
                if($picture['name']) {
                    $this->pictureValidate($picture);
                }
            } elseif(isset($_POST['Goods']['pic_test'])) {
                $_POST['Goods']['pic_min'] = $_POST['Goods']['pic_test'];
            }

            $model->attributes=$_POST['Goods'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }
        $this->categoryArray = Produser::model()->findAll();
        $this->render('update',array(
            'model'=>$model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */


    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }


    /**
     * Manages all models.
     */
    public function actionIndex()
    {
        if(Yii::app()->user->isGuest){
            $this->actionLogin();
        }
        else{
            $model=new Goods('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['Goods']))
                $model->attributes=$_GET['Goods'];
            $this->render('index',array(
                'model'=>$model,
            ));
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Goods the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Goods::model()->findByPk($id);
        if($model->draft==1){
            $model->draft="Опубликованно";
        } else {
            $model->draft="Черновик";
        }
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Goods $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='goods-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
	

	
}

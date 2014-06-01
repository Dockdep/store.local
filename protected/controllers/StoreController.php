<?php

class StoreController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
    public $categoryName=array();
    public $sidebar;

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

    public function getSort() {
        $sort = new CSort();
        $sort->sortVar = 'sort';
        $sort->defaultOrder = 't.date ASC';
        $sort->multiSort = true;
        $sort->attributes = array(
            'title'=>array(
                'label'=>'Названию',
                'asc'=>'t.title ASC',
                'desc'=>'t.title DESC',
                'default'=>'desc',
            ),
            'date'=>array(
                'asc'=>'t.date ASC',
                'desc'=>'t.date DESC',
                'default'=>'ASC',
                'label'=>'Дате',
            ),
            'price'=>array(
                'asc'=>'t.price ASC',
                'desc'=>'t.price DESC',
                'default'=>'desc',
                'label'=>'Цене',
            ),
        );
        return $sort;
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
				'actions'=>array('index','view', 'sidebarchild', 'selectgoods', 'search', 'youurofil', 'filtergoods' ),
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

        $model = $this->loadModel($id);
        $this->sidebar = Produser::model()->getMainWatch();
        $this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Goods;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Goods']))
		{
			$model->attributes=$_POST['Goods'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

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
		{
			$model->attributes=$_POST['Goods'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $model = Goods::model()->findAll();

        $num=count($model);
        for($i=0; $i<$num; $i++){
           $id = $model[$i]['child_id'];
            $this->categoryName[$id]['name'] = Produser::model()->findByPk($id)->parent_id;
            if($this->categoryName[$id]['name']){
                $this->categoryName[$id]['name']= Produser::model()->find('prod_id = :parentId', array(':parentId' => $this->categoryName[$id]['name']))->name;
            } else {
                $this->categoryName[$id]['name'] = Produser::model()->findByPk($id)->name;
            }
        }
        $sort = $this->getSort();
        $dataProvider=new CActiveDataProvider('Goods', array(
            'sort'=>$sort,
            'pagination' => array(
                'pageSize' =>6,
        )
        ));

        $this->sidebar = Produser::model()->getMainWatch();

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Goods('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Goods']))
			$model->attributes=$_GET['Goods'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

    public function actionSidebarChild()
    {
        if(isset($_GET['parentId'])) {
            $id = $_GET['parentId'];
            $this->sidebar = Produser::model()->getByParent($id);
            $this->renderPartial('_sidebar', $this->sidebar);
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
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


    public function actionSelectGoods()
    {
        $sort = $this->getSort();
        $criteria = new CDbCriteria;

        $subCategory = Yii::app()->request->getParam('subCategory');
        $category = Yii::app()->request->getParam('category');
        $gender = Yii::app()->request->getParam('gender');
        $type = Yii::app()->request->getParam('type');
        $from = Yii::app()->request->getParam('from');
        $to = Yii::app()->request->getParam('to');
        $stock = Yii::app()->request->getParam('stock');


        if($category) {
            $categories = Produser::model()->getProduserName($category);
            $categories = implode("','", $categories);
            $criteria->addCondition("child_id IN ('$categories')");
        }
        if($subCategory) {
            $criteria->addCondition("child_id = $subCategory");
        }
        if($type) {
            $criteria->addCondition("type = $type ");
        }
        if($gender) {
            $criteria->addCondition("gender = $gender");
        }
        if($from && $to) {
            $criteria->addCondition("price BETWEEN $from AND $to");
        }
        if($stock) {
            $criteria->addCondition("stock = 1");
        } else {
            $criteria->addCondition("stock IN ('0','1')");
        }



        if(isset($_GET['parentId'])) {
            $id = $_GET['parentId'];
            $produser =  Produser::model();
            $array = $produser->getProduserName($id);
            array_push($array, $id);
            $model = Goods::model()->findAllByAttributes(array('child_id' =>$array));
            $array = implode("','", $array);

            $criteria->condition = "child_id IN ('$array')";



            $dataProvider=new CActiveDataProvider('Goods', array(
                'criteria'=>$criteria,
                'sort'=>$sort,
                'pagination' => array(
                    'pageSize' =>6,
                )
            ));
        } else {
            $model = Goods::model()->findAll();
            $produser =  Produser::model();
            $dataProvider=new CActiveDataProvider('Goods', array(
                'criteria'=>$criteria,
                'sort'=>$sort,
                'pagination' => array(
                    'pageSize' =>6,
                )
            ));
        }

            $num=count($model);
            for($i=0; $i<$num; $i++){
                $id = $model[$i]['child_id'];
                $this->categoryName[$id]['name'] = $produser->findByPk($id)->parent_id;
                if($this->categoryName[$id]['name']){
                    $this->categoryName[$id]['name']= $produser->find('prod_id = :parentId', array(':parentId' => $this->categoryName[$id]['name']))->name;
                } else {
                    $this->categoryName[$id]['name'] = $produser->findByPk($id)->name;
                }
            }



            $id = $_GET['parentId'];

            $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$dataProvider,
                'viewData' => array('categoryName'=>$this->categoryName),
                'itemView'=>'_view',
                'htmlOptions' => array('class' => 'parentId',
                                        'data-parentId' => $id),
                'summaryText' => '',
                'sortableAttributes' => array('title', 'date', 'price'),
                'pager' => array(
                    'class' => 'CLinkPager',
                    'header' => '',
                    'firstPageLabel'=>'<<',
                    'prevPageLabel'=>'<',
                    'nextPageLabel'=>'>',
                    'lastPageLabel'=>'>>',
                    'maxButtonCount'=>'4',
                    'cssFile'=>'false'
                ),

            ));
    }

    protected function actionFilterGoods()
    {
        $user = Yii::app()->db->createCommand()
            ->select('username, password')
            ->from('tbl_user')
            ->where('id=:id', array(':id'=>4))
            ->andWhere('child_id=:id', array(':id'=>3))
            ->queryRow();

        {
            $sort = $this->getSort();

            if(isset($_GET['parentId'])) {
                $id = $_GET['parentId'];
                $produser =  Produser::model();
                $array = $produser->getProduserName($id);
                array_push($array, $id);
                $model = Goods::model()->findAllByAttributes(array('child_id' =>$array));
                $dataProvider=new CArrayDataProvider($user, array(
                    'sort'=>$sort,
                    'pagination' => array(
                        'pageSize' =>6,
                    )
                ));
            } else {
                $model = Goods::model()->findAll();
                $produser =  Produser::model();
                $dataProvider=new CActiveDataProvider('Goods', array(
                    'sort'=>$sort,
                    'pagination' => array(
                        'pageSize' =>6,
                    )
                ));
            }

            $num=count($model);
            for($i=0; $i<$num; $i++){
                $id = $model[$i]['child_id'];
                $this->categoryName[$id]['name'] = $produser->findByPk($id)->parent_id;
                if($this->categoryName[$id]['name']){
                    $this->categoryName[$id]['name']= $produser->find('prod_id = :parentId', array(':parentId' => $this->categoryName[$id]['name']))->name;
                } else {
                    $this->categoryName[$id]['name'] = $produser->findByPk($id)->name;
                }
            }



            $id = $_GET['parentId'];

            $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$dataProvider,
                'viewData' => array('categoryName'=>$this->categoryName),
                'itemView'=>'_view',
                'htmlOptions' => array('class' => 'parentId',
                    'data-parentId' => $id),
                'summaryText' => '',
                'sortableAttributes' => array('title', 'date', 'price'),
                'pager' => array(
                    'class' => 'CLinkPager',
                    'header' => '',
                    'firstPageLabel'=>'<<',
                    'prevPageLabel'=>'<',
                    'nextPageLabel'=>'>',
                    'lastPageLabel'=>'>>',
                    'maxButtonCount'=>'4',
                    'cssFile'=>'false'
                ),

            ));
        }
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

    public function actionSearch()
    {
        $search = new SiteSearchForm;

        if(isset($_POST['SiteSearchForm'])) {
            $search->attributes = $_POST['SiteSearchForm'];
            $_GET['searchString'] = $search->string;
        } else {
            $search->string = $_GET['searchString'];
        }

        $criteria = new CDbCriteria(array(
            'condition' => 'title LIKE :keyword',
            'order' => 'date DESC',
            'params' => array(
                ':keyword' => '%'.$search->string.'%',
            ),
        ));

        $materialCount = Goods::model()->count($criteria);
        $pages = new CPagination($materialCount);
        $pages->pageSize = Yii::app()->params['materialsPerPage'];
        $pages->applyLimit($criteria);

        $materials = Goods::model()->findAll($criteria);

        $this->render('found',array(
            'materials' => $materials,
            'pages' => $pages,
            'search' => $search,
        ));

    }

    public function actionYouUrofil()
    {
        if(isset($_GET['parentId'])) {
            $id = $_GET['parentId'];
            $this->sidebar = Produser::model()->getByParent($id);
             foreach($this->sidebar as $item) {
                 $id =$item['prod_id'];
                 $name = $item['name'];
                echo "<option class = 'newUrofiloFilds' value='$id'>$name</option>";
             }

        }
    }


}


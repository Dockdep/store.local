<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main_admin.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/text.css" />
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/js/jquery.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/js/ul-drop.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="sait" id="page">
    <?php if(Yii::app()->user->isGuest){?>
    <?php echo $content;
    } else {?>
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Перейти на сайт', 'url'=>array('/site/index')),
				array('label'=>'Список Товаров', 'url'=>array('/admin/goods')),
				array('label'=>'Добавить Товар', 'url'=>array('/admin/goods/create')),
                array('label'=>'Список Категории', 'url'=>array('/admin/produser')),
                array('label'=>'Добавить Категорию', 'url'=>array('/admin/produser/create')),
				array('label'=>'Login', 'url'=>array('/admin/admin/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/admin/admin/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php echo $content;}?>
	<div class="clear"></div>
</div><!-- page -->
</body>
</html>

<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <!--<meta http-equiv="X-UA-Compatible" content="IE=10" />-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css"/>
	<!--[if lte IE 8]><script src="<?php echo Yii::app()->request->baseUrl; ?>/css/js/oldies.js" charset="utf-8"></script><![endif]-->
    <script src="/css/js/jquery.min.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<div class="sait">
	<div class="head">
	<div id="search_f"></div>
        <?php $this->widget('SiteSearch'); ?>
		<div id="#">
			<div id="#"><?php echo CHtml::encode(Yii::app()->name); ?></div>
		</div>
	</div>
	<div id="menu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Главная', 'url'=>array('/site/index')),
				array('label'=>'Купить часы', 'url'=>array('/store')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Скупка', 'url'=>array('/site/contact')),
                array('label'=>'Админка', 'url'=>array('admin/goods/index')),
			),
		)); ?>
	</div><!-- menu -->
	<div class="content">
		<div class="crumbs_">
		<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
			)); ?><!-- breadcrumbs -->
		<?php endif?>
		</div>
		
		<?php echo $content; ?>

	</div>
	
	<div class="footer">
	----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------<br/>
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- site -->
</body>
</html>

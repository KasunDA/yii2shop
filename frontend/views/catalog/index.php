<?php
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('catalog', 'Catalog');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?= Yii::t('catalog', 'Categories') ?>
            </div>

            <div class="panel-body">
                <?= $this->render('_nav') ?>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-12">
        <h1><?= Html::encode($this->title) ?></h1>

        <div class="well">
            <?= Yii::t('catalog', 'Order by:') ?>
            <?= $dataProvider->sort->link('name', [
                'class' => 'btn btn-primary btn-sm'
            ]) ?>
            <?= $dataProvider->sort->link('category_id', [
                'class' => 'btn btn-primary btn-sm'
            ]) ?>
            <?= $dataProvider->sort->link('price', [
                'class' => 'btn btn-primary btn-sm'
            ]) ?>
            <?= $dataProvider->sort->link('date', [
                'class' => 'btn btn-primary btn-sm'
            ]) ?>
        </div>

        <?= ListView::widget([
            'layout' => "{summary}\n<div class=\"row\">{items}</div>\n{pager}",
            'dataProvider' => $dataProvider,
            'itemView' => '_product',
            'summaryOptions' => [
                'class' => 'alert alert-info'
            ],
        ]) ?>
    </div>
</div>
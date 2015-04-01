<?php

use common\models\Status;
use common\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */

$category_models = Category::find()->all();
$categories = ArrayHelper::map($category_models, 'id', 'name');

$status_models = Status::find()->all();
$statuses = ArrayHelper::map($status_models, 'id', 'name');
?>
<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <?= Yii::t('product', 'Search Products') ?>
            </a>
        </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
            <div class="product-search">

                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                ]); ?>

                <div class="row">
                    <div class="col-sm-4">
                        <?= $form->field($model, 'name') ?>
                    </div>
                    <div class="col-sm-4">
                        <?= $form->field($model, 'price') ?>
                    </div>
                    <div class="col-sm-4">
                        <?= $form->field($model, 'slug') ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($model, 'category_id')->dropDownList($categories) ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($model, 'status_id')->dropDownList($statuses) ?>
                    </div>
                </div>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('product', 'Search'), ['class' => 'btn btn-primary']) ?>
                    <?= Html::resetButton(Yii::t('product', 'Reset'), ['class' => 'btn btn-default']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

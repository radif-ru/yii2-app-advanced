<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\tables\Task */
/* @var $usersList[] \frontend\controllers\AdminTaskController */
/* @var $statusesList[] \frontend\controllers\AdminTaskController */

$this->title = 'Update Task: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="task-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'usersList' => $usersList,
        'statusesList' => $statusesList,
    ]) ?>

</div>

<?php

namespace app\modules\admin\controllers;

use app\models\HelloModel;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $array = HelloModel::getAll();
        return $this->render('index', ['model' => $array]);
    }

    public function actionCreate()
    {
        $model = new HelloModel();

        if (isset($_POST['HelloModel'])) {
            $model->title = $_POST['HelloModel']['title'];
            $model->description = $_POST['HelloModel']['description'];
            //$model->attributes = $_POST['HelloModel'];
            if ($model->validate() && $model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', ['model' => $model]);
    }

    public function actionEdit($id)
    {
        $one = HelloModel::getOne($id);

        if (isset($_POST['HelloModel'])) {
            $one->title = $_POST['HelloModel']['title'];
            $one->description = $_POST['HelloModel']['description'];
            //$one->attributes = $_POST['HelloModel'];
            if ($one->validate() && $one->save()) {
                return $this->redirect(['index']);
            }
        }
        return $this->render('edit', ['one' => $one]);
    }

    public function actionDelete($id)
    {
        $model = HelloModel::getOne($id);
        if ($model !== NULL) {
            $model->delete();
            return $this->redirect(['index']);
        }
        // need error page!
        //=-31293podsp
    }

}

<?php

namespace app\controllers;

use app\models\Login;
use app\models\Signup;
use Yii;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\ContactForm;
use app\models\MyForm;
use yii\web\UploadedFile;
use app\models\HelloModel;


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        return $this->render('index');
    }

    public function actionSignup()
    {
        $model = new Signup();

        if(isset($_POST['Signup'])){

            $model->attributes = Yii::$app->request->post('Signup');

            if ($model->validate()){
                $model->signup();
                $this->goHome();
            }
        }
        return $this->render('signup', ['model'=>$model]);
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionHello()
    {
        $array = HelloModel::getAll();

        return $this->render('hello', ['obj' => $array]);
    }

    public function actionOne($id)
    {
        $one = HelloModel::getOne($id);
        return $this->render('one', ['one' => $one]);
    }

    public function actionForm()
    {
        $form = new MyForm();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            $name = Html::encode($form->name);
            $email = Html::encode($form->email);

            $form->file = UploadedFile::getInstance($form, 'file');

            $form->file->saveAs('photo/' . $form->file->baseName . "." . $form->file->extension);
        } else {
            $name = '';
            $email = '';
        }
        return $this->render('form',
            ['form' => $form,
                'name' => $name,
                'email' => $email,
            ]
        );

    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $login_model = new Login();

        if (Yii::$app->request->post('Login')) {

           $login_model->attributes = Yii::$app->request->post('Login');

            if ($login_model->validate()){
                Yii::$app->user->login($login_model->getUser());
                return $this->goHome();
            }
        }
        return $this->render('login', ['login_model'=>$login_model]);
    }

    public function actionLogout()
    {
        if (!Yii::$app->user->isGuest) {
            Yii::$app->user->logout();
            return $this->redirect(['login']);
        }
    }
}

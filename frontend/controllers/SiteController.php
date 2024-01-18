<?php

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Caja;
use frontend\models\CajaSearch;
use frontend\models\Categoria;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $modelCategoria = new Categoria();
        $modelCategorias = Categoria::find()->all();
        if (Yii::$app->request->post()) {
            var_dump(Yii::$app->request->post()); die();
        }else{
            $mesActual = date('m');
            var_dump($mesActual);    
        }
        
        $totalMesAct = [];
        $totalGen = [];
        foreach($modelCategorias as $categoria){
            $categoriaArray = [];
            $querySumMesAct = Caja::find()
                ->select('SUM(monto) AS total')
                ->where(['id_categoria' => $categoria['id'], 'tipo' => 0])
                ->andWhere(['MONTH(fecha)' => $mesActual]);
            $totalSumMesAct = $querySumMesAct->createCommand()->queryScalar();

            $queryDifMesAct = Caja::find()
                ->select('SUM(monto) AS total')
                ->where(['id_categoria' => $categoria['id'], 'tipo' => 1])
                ->andWhere(['MONTH(fecha)' => $mesActual]);
            $totalDifMesAct = $queryDifMesAct->createCommand()->queryScalar();

            $categoriaArray['categoria'] = $categoria['descripcion'];
            $categoriaArray['Ingreso'] = $totalSumMesAct;
            $categoriaArray['Egreso'] = $totalDifMesAct;
            $categoriaArray['Saldo'] = $totalSumMesAct - $totalDifMesAct;
            $totalMesAct[$categoria['descripcion']] = $categoriaArray;


            $categoriaArrayGen = [];
            $querySum = Caja::find()
                ->select('SUM(monto) AS total')
                ->where(['id_categoria' => $categoria['id'], 'tipo' => 0]);
            $totalSum = $querySum->createCommand()->queryScalar();

            $queryDif = Caja::find()
                ->select('SUM(monto) AS total')
                ->where(['id_categoria' => $categoria['id'], 'tipo' => 1]);
            $totalDif = $queryDif->createCommand()->queryScalar();

            $categoriaArrayGen['categoria'] = $categoria['descripcion'];
            $categoriaArrayGen['Ingreso'] = $totalSum;
            $categoriaArrayGen['Egreso'] = $totalDif;
            $categoriaArrayGen['Saldo'] = $totalSum - $totalDif;
            $totalGen[$categoria['descripcion']] = $categoriaArrayGen;      
        }

        $ingresosMensuales = Caja::find()
            ->select(['MONTH(fecha) AS mes', 'SUM(monto) AS total'])
            ->where(['tipo' => 0]) // 0 para ingresos
            //->andWhere(['tus_filtros']) // Agrega tus filtros
            ->groupBy(['mes'])
            ->asArray()
            ->all();

        $egresosMensuales = Caja::find()
            ->select(['MONTH(fecha) AS mes', 'SUM(monto) AS total'])
            ->where(['tipo' => 1]) // 1 para egresos
            //->andWhere(['tus_filtros']) // Agrega tus filtros
            ->groupBy(['mes'])
            ->asArray()
            ->all();

            //var_dump($ingresosMensuales); die();


        return $this->render('index', [
            'totales' => $totalMesAct,
            'totalGen' => $totalGen,
            'ingresos' => $ingresosMensuales,
            'egresos' => $egresosMensuales
        ]);

    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
    public function actionConsulta(){
        $cajas = Caja::find()
            ->where(['id_cliente' => 2])
            ->all();

        $query = Caja::find()
                ->select('monto')
                ->where(['tipo' => 1]);
        $totalEgreso= $query->all();

        $model = new Caja();

        /*echo('<pre>');
        var_dump($totalEgreso); 
        echo('</pre>');die();*/

        return $this->render('consulta',[
            'totalEgreso' => $totalEgreso,
            'model' => $model,
        ]);
    }

    // En el controlador
public function actionBuscar()
{
    $selectedMonth = Yii::$app->request->get('selectedMonth');
    
    // Validación de entrada y lógica de búsqueda
    if ($selectedMonth) {
        // Realizar una consulta a la base de datos, por ejemplo, utilizando Active Record de Yii:
        $results = TuModelo::find()
            ->where(['like', 'tuCampoFecha', '02-' . $selectedMonth])
            ->all();
        
        // Haz algo con los resultados (por ejemplo, muestra una vista con los resultados)
        return $this->render('resultados', ['results' => $results]);
    } else {
        // No se ha seleccionado un mes, puedes mostrar un mensaje de error o redirigir a otra página.
    }
}

}

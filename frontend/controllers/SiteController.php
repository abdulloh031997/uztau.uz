<?php

namespace frontend\controllers;

use backend\models\CollectionCategorySearch;
use common\models\About;
use common\models\Collection;
use common\models\CollectionCategory;
use common\models\Cours;
use common\models\CoursBlock;
use common\models\CoursCategory;
use common\models\Impressions;
use common\models\Post;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Partner;
use common\models\Slider;
use common\models\Team;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\Cookie;

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
                'class' => AccessControl::className(),
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
                'class' => VerbFilter::className(),
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
                'class' => 'yii\web\ErrorAction',
                'layout'=>false
            ],
            // 'captcha' => [
            //     'class' => 'yii\captcha\CaptchaAction',
            //     'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            // ],
        ];
    }

    public function actionChange($lang)
    {
        $available_locales = [
            'ru',
            'en',
            'uz',
        ];
        if (!in_array($lang, $available_locales)) {
            throw new BadRequestHttpException();
        }
        \Yii::$app->language = $lang;
        $cookies = Yii::$app->response->cookies;

        $cookies->add(new Cookie([
            'name' => 'language',
            'value' => $lang,
        ]));

        $cookie = new Cookie([
            'name' => 'language',
            'value' => $lang,
            'expire' => time() + 86400 * 365,
        ]);
        \Yii::$app->getResponse()->getCookies()->add($cookie);

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $post = Post::find()->where(['status' => 1])->andWhere(['language' => current_lang()])->limit(6)->orderBy(['id' => SORT_DESC])->asArray()->all();
        $slider = Slider::find()->where(['status' => 1])->andWhere(['language' => current_lang()])->orderBy(['id' => SORT_DESC])->asArray()->all();
        $partner = Partner::find()->where(['status' => 1])->andWhere(['language' => current_lang()])->orderBy(['id' => SORT_DESC])->asArray()->all();
        $about = About::find()->where(['status' => 1])->andWhere(['language' => current_lang()])->orderBy(['id' => SORT_DESC])->asArray()->one();
        $impressions = Impressions::find()->where(['status' => 1])->andWhere(['language' => current_lang()])->orderBy(['id' => SORT_DESC])->asArray()->all();
        $collection_category_one = CollectionCategory::find()->andWhere(['language' => current_lang()])->where(['status' => 1])->orderBy(['id' => SORT_DESC])->asArray()->one();
        $collection_category = CollectionCategory::find()->andWhere(['language' => current_lang()])->where(['status' => 1])->orderBy(['id' => SORT_DESC])->limit(5)->asArray()->all();
        $collection = Collection::find()->where(['status' => 1])->andWhere(['language' => current_lang()])->orderBy(['id' => SORT_DESC])->asArray()->all();
        $team = Team::find()->where(['status' => 1])->andWhere(['language' => current_lang()])->orderBy(['id' => SORT_DESC])->asArray()->all();
        //        print_r($collection_category);
        return $this->render('index', compact('post', 'partner', 'impressions', 'collection_category', 'collection_category_one', 'collection', 'team', 'about', 'slider'));
    }
    public function actionInner($id)
    {
        $post_inner = Post::find()->where(['status' => 1, 'id' => $id])->andWhere(['language' => current_lang()])->asArray()->one();
        return $this->render('inner', compact('post_inner'));
    }
    public function actionOrganizational()
    {
        return $this->render('organizational');
    }
    public function actionTeam()
    {
        return $this->render('team');
    }
    public function actionSection()
    {
        return $this->render('section');
    }
    public function actionNews()
    {
        $query =  Post::find()
                ->joinWith('category')
                ->where(['post.status' => 1])->andWhere(['post.language' => current_lang()]);

        $count = $query->count();

        $pagination = new  \yii\data\Pagination(['totalCount' => $count, 'pageSize' => 9]);

        $news = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->asArray()->orderBy(['id' => SORT_DESC])->all();
        return $this->render('news', compact('news', 'pagination'));
    }
    public function actionArticle()
    {
        $query =  Post::find()->where(['status' => 1, 'category_id' => 2])->andWhere(['language' => current_lang()]);

        $count = $query->count();

        $pagination = new  \yii\data\Pagination(['totalCount' => $count, 'pageSize' => 9]);

        $news = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->asArray()->orderBy(['id' => SORT_DESC])->all();
        return $this->render('article', compact('news', 'pagination'));
    }
    public function actionInnerNews($id)
    {
        $post = Post::find()->where(['category_id' => $id])->andWhere(['language' => current_lang()])->asArray()->all();
        return $this->render('inner-news', compact('post'));
    }
    public function actionCollection($id)
    {
        $collection = Collection::find()->where(['id' => $id])->andWhere(['language' => current_lang()])->one();
        return $this->render('collection', compact('collection'));
    }
    public function actionCall()
    {
        $collection = Collection::find()->andWhere(['language' => current_lang()])->all();
        return $this->render('call', compact('collection'));
    }
    public function actionCollectionAll($id)
    {
        $collection = Collection::find()->where(['collection_category_id' => $id])->andWhere(['language' => current_lang()])->all();
        return $this->render('collection-all', compact('collection'));
    }
    public function actionExhibition()
    {
        $impressions = Impressions::find()->andWhere(['language' => current_lang()])->all();
        return $this->render('exhibition', compact('impressions'));
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
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
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
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        $about = About::find()->where(['language' => current_lang()])->one();
        return $this->render('about', compact('about'));
    }
    public function actionProfile()
    {
        return $this->render('profile');
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
            return $this->redirect('login');
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
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
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
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
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
}
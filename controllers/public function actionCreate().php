public function actionCreate()
{   
    $user = new User;
    $profile = new Profile;

    if ($user->load(Yii::$app->request->post()) && $profile->load(Yii::$app->request->post()) && Model::validateMultiple([$user, $profile])) {

        $user->save(false); // skip validation as model is already validated
        $profile->user_id = $user->id; 
        $profile->save(false); 

        return $this->redirect(['view', 'id' => $user->id]);
    } else {
        return $this->render('create', [
            'user' => $user,
            'profile' => $profile,
        ]);
    }
}
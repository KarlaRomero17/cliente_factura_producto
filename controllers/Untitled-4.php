
Mukimposible
hace 2 años
Thanks for the video. I had custom primary key which was not updating in child tables (as foreign key) when form is submitted (saved). For those that will meet this problem, the solution is to add an if statement. See example below

public function actionCreate()
    {
        $model1 = new Userinfo();
        $model2 = new Useraddress();
       

        if ($model1->load(Yii::$app->request->post()) && $model2->load(Yii::$app->request->post())  && $model1->save() && $model2->save()) {
            if ($model1->save()) {
                $model1->refresh();


//assuming 'id' is the primary key in model 1 and 'fk_id' is its reference(foreign key) in model 2

                $model2->fk_id = $model1-> id;
             

                $model2->save();
            

             }
        return $this->redirect(['view', 'id' => $model1->id]);
        }
        return $this->render('create', [
            'model1' => $model1,
            'model2' => $model2,
        ]);
    }

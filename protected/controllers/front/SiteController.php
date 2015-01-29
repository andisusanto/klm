<?php

class SiteController extends BaseController
{

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
        Yii::app()->clientScript->registerScriptFile('http://maps.googleapis.com/maps/api/js?sensor=false&extension=.js&output=embed', CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/gmap.js', CClientScript::POS_HEAD);
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

    public function actionAboutUs()
    {
        $aboutus = PageContent::model()->findByAttributes(array('PageName'=>'AboutUs'));
        $vision = PageContent::model()->findByAttributes(array('PageName'=>'Vision'));
        $mission = PageContent::model()->findByAttributes(array('PageName'=>'Mission'));
        $model = array();
        $model['AboutUs'] = $aboutus->Content;
        $model['Vision'] = $vision->Content;
        $model['Mission'] = $mission->Content;
        $this->render('aboutus', array('model'=>$model));
    }

    public function actionSignUp()
    {
        $registermodel = new RegisterForm;
        $loginmodel = new CustomerLogInForm;
        if(isset($_POST['RegisterForm']))
		{
			$registermodel->attributes=$_POST['RegisterForm'];
            $registermodel->validate();
			$customer = new Customer;
            $customer->TitleOfCourtesy = $registermodel->TitleOfCourtesy;
            $customer->Name = $registermodel->Name;
            $customer->TypeOfSkin = $registermodel->TypeOfSkin;
            $customer->CountryOfOrigin = $registermodel->CountryOfOrigin;
            $customer->DateOfBirth = $registermodel->DateOfBirth;
            $customer->Email = $registermodel->Email;
            $customer->setPassword($registermodel->Password);
            if($customer->save())
                $session = Yii::app()->session;
                $session->open();
                $session['currentCustomerEmail'] = $registermodel->Email;
                $this->redirect(array('index'));
		}
        else
        {
            if(isset($_POST['CustomerLogInForm']))
            {
                $loginmodel->attributes=$_POST['CustomerLogInForm'];
                if($loginmodel->validate())
                {
                    $session = Yii::app()->session;
                    $session->open();
                    $session['currentCustomerEmail'] = $loginmodel->Email;
                    $this->redirect(array('index'));
                }
            }
        }
        $this->layout = false;
		$this->render('signup',array('registermodel'=>$registermodel,'loginmodel'=>$loginmodel));
    }
    
    public function actionLogOut()
    {
        $session = Yii::app()->session;
        unset($session['currentCustomerEmail']);
        $this->redirect(array('site/index'));
    }

    public function actionGetShoppingCart()
    {
        $this->renderPartial('partialviewshoppingcart');
    }
    
    public function actionViewMyProfile()
    {
        $session = Yii::app()->session;
        $session->open();
        $this->checkLogIn($session);
        $customer = $this->getLoggedInCustomer($session);
        $this->render('myprofile',array('model'=>$customer));
    }
    
    public function actionChangePointsToVoucher()
    {
        $session = Yii::app()->session;
        $session->open();
        $this->checkLogIn($session);
        $customer = $this->getLoggedInCustomer($session);
        $model = new ChangePointsToVoucherForm;
        if(isset($_POST['ChangePointsToVoucherForm']))
		{
			$model->attributes=$_POST['ChangePointsToVoucherForm'];
            if($model->validate()){
                $configuration = Configuration::model()->findByPk(1);
                $trans = Yii::app()->db->beginTransaction();
                if($customer->deductLoyaltyPoint($model->ChangePoint,'Change to voucher') && $customer->save())
                {
                    $voucher = new Voucher();
                    $voucher->Customer = $customer->Id;
                    $voucher->TransDate = new CDbExpression('NOW()');
                    $voucher->setBalance = $model->ChangePoint * $configuration->LoyaltyPointConversionRate;
                    
                }
                $this->redirect(array('index'));
            }
		}
		$this->render('changepointstovoucher',array('model'=>$model));
    }
    
    public function actionCheckOut()
    {
        $session = Yii::app()->session;
        $session->open();
        $this->checkLogIn($session);
        $customer = $this->getLoggedInCustomer($session);
        $cart = $session['cart'];
        if ($cart == NULL)
            $cart = new Cart;
        $checkoutformmodel = new CheckOutForm;
        $checkOutInformation = $session['checkoutinformation'];
        
        $newaddress = new CustomerAddress();
        $ChangePointsToVoucherForm = new ChangePointsToVoucherForm;
        
        if(isset($_POST['CustomerAddress']))
        {
            $newaddress->setAttributes($_POST['CustomerAddress']);
            $newaddress->Customer = $customer->Id;
            if(!$newaddress->save())
            {
                Yii::app()->user->setFlash('tmpCustomerAddress',$newaddress);
            }
            $this->refresh();
        }
        if(isset($_POST['ChangePointsToVoucherForm']))
        {
            $ChangePointsToVoucherForm->setAttributes($_POST['ChangePointsToVoucherForm']);
            if(!$ChangePointsToVoucherForm->validate())
            {
                Yii::app()->user->setFlash('tmpChangePointsToVoucherForm',$ChangePointsToVoucherForm);
            }
            else
            {
                $trans = Yii::app()->db->beginTransaction();
                $Rate = Configuration::model()->findByPk(1)->LoyaltyPointConversionRate;
                $Balance = $ChangePointsToVoucherForm->ChangePoint * $Rate;
                $customer->deductLoyaltyPoint($ChangePointsToVoucherForm->ChangePoint, 'Change into voucher');
                $voucher = $customer->addVoucher($Balance,'Create from loyalty point');
                if($voucher->save() && $customer->save())
                {
                    $trans->commit();
                }
            }
            $this->refresh();
        }
        if($checkOutInformation != NULL)
        {
            $checkoutformmodel->ShippingAgent = $checkOutInformation->ShippingAgent;
            $checkoutformmodel->ShippingPoint = $checkOutInformation->ShippingPoint;
            $checkoutformmodel->VoucherAmount = $checkOutInformation->VoucherAmount;
            $checkoutformmodel->Note = $checkOutInformation->Note;
        }
        else
        {
            $session['checkoutinformation'] = $checkOutInformation = new CheckOutInformation;
        }
        if(isset($_POST['CheckOutForm']))
		{
			$checkoutformmodel->attributes=$_POST['CheckOutForm'];
            if($checkoutformmodel->validate()){
                $session['checkoutinformation']->ShippingAgent = $checkoutformmodel->ShippingAgent;
                $session['checkoutinformation']->ShippingPoint = $checkoutformmodel->ShippingPoint;
                if($checkoutformmodel->VoucherAmount > $customer->CurrentVoucherBalance)
                    $checkoutformmodel->VoucherAmount = $customer->CurrentVoucherBalance;
                $session['checkoutinformation']->VoucherAmount = $checkoutformmodel->VoucherAmount;
                $session['checkoutinformation']->Note = $checkoutformmodel->Note;
                $this->redirect(array('site/checkout'));
            }
		}
        if (Yii::app()->user->hasFlash('tmpCustomerAddress'))
        {
            $newaddress = Yii::app()->user->getFlash('tmpCustomerAddress');
        }
        if (Yii::app()->user->hasFlash('tmpChangePointsToVoucherForm'))
        {
            $ChangePointsToVoucherForm = Yii::app()->user->getFlash('tmpChangePointsToVoucherForm');
        }
		$this->render('checkout',array('checkoutformmodel'=>$checkoutformmodel, 'customer'=>$customer, 'checkoutinformation'=>$checkOutInformation, 'cart'=>$cart, 'newaddress'=>$newaddress, 'ChangePointsToVoucherForm'=>$ChangePointsToVoucherForm));
    }
    
    public function actionAddToCart()
    {
        if(isset($_POST['AddToCartForm']))
        {
            $model = new AddToCartForm;
            $model->setAttributes($_POST['AddToCartForm']);
            if($model->validate())
            {
                $session = Yii::app()->session;
                $session->open();
                if($session['cart'] == NULL){
                    $session['cart'] = new Cart();
                }
                $session['cart']->addToCart($model->Product,$model->Quantity);
                echo "S";
            }
            else
            {
                echo "E";
            }
        }
    }
    
    public function actionRemoveFromCart()
    {
        if(isset($_POST['RemoveFromCartForm']))
        {
            $model = new RemoveFromCartForm;
            $model->setAttributes($_POST['RemoveFromCartForm']);
            if($model->validate())
            {
                $session = Yii::app()->session;
                $session->open();
                if($session['cart'] != NULL){
                    $session['cart']->removeFromCart($model->Product,$model->Quantity);
                }
            }
        }
    }
    
    public function actionEditCartItem()
    {
        if(isset($_POST['EditCartItemForm']))
        {
            $model = new EditCartItemForm;
            $model->setAttributes($_POST['EditCartItemForm']);
            if($model->validate())
            {
                $session = Yii::app()->session;
                $session->open();
                if($session['cart'] != NULL){
                    $session['cart']->editCartItemQuantity($model->Product,$model->Quantity);
                }
            }
        }
        $this->redirect(array('site/cart'));
    }
    
    public function actionShowProduct($id)
    {
        $product = Product::model()->findByPk($id);
        $this->render('showproduct',array('model'=>$product));
    }
    
    public function actionShowCategory($id)
    {
        $category = Category::model()->findByPk($id);
        $this->render('showcategory',array('model'=>$category));
    }
    
    public function actionShowBrand($id)
    {
        $brand = Brand::model()->findByPk($id);
        $this->render('showbrand',array('model'=>$brand));
    }
    public function actionShowTodaySpecials()
    {
        $todaySpecialProducts = Product::getTodaySpecialProducts();
        $this->render('todayspecial',array('model'=>$todaySpecialProducts));
    }
    public function actionShowNewArrivals()
    {
        $category = new CustomCategory();
        $category->Name = 'New Arrivals';
        $category->products = Product::getNewArrivalProducts();
        $this->render('showcategory',array('model'=>$category));
    }
    public function actionLocalEditorial()
    {
        $galleries = Gallery::model()->findAll();
        $this->render('localeditorial',array('model'=>$galleries));
    }
    
    public function actionLocalEditorialDetail($id)
    {
        $gallery = Gallery::model()->findByPk($id);
        $this->render('localeditorialdetail',array('model'=>$gallery));
    }

    public function actionCart()
    {
        $session = Yii::app()->session;
        $session->open();
        $cart = $session['cart'];
        if ($cart == NULL)
            $cart = new Cart;
        $this->render('cart', array('cart'=>$cart));
    }

    public function actionPayment()
    {   
        $session = Yii::app()->session;
        $session->open();
        $cart = $session['cart'];
        if ($cart == NULL)
            $cart = new Cart;
        $this->render('payment', array('cart'=>$cart));
    }

             /*
    * FOR TESTING ONLY
    public function actionTestAdd()
    {
        $session = Yii::app()->session;
        $session->open();
        $customer = $this->getLoggedInCustomer($session);
        $loyaltypoint = $customer->addLoyaltyPoint(10,'testing add');
        $trans = Yii::app()->db->beginTransaction();
        if($loyaltypoint->save() && $customer->save())
            $trans->commit();
    }
  
    
    public function actionTestDeduct()
    {
        $session = Yii::app()->session;
        $session->open();
        $customer = $this->getLoggedInCustomer($session);
        $trans = Yii::app()->db->beginTransaction();
        if($customer->deductLoyaltyPoint(25,'test deduct') && $customer->save())
            $trans->commit();
    }
    
    */
    public function actionTestAdd()
    {
        $session = Yii::app()->session;
        $session->open();
        $customer = $this->getLoggedInCustomer($session);
        $voucher = $customer->addVoucher(10,'testing add');
        $trans = Yii::app()->db->beginTransaction();
        if($voucher->save() && $customer->save())
            $trans->commit();
    }
  
    
    public function actionTestDeduct()
    {
        $session = Yii::app()->session;
        $session->open();
        $customer = $this->getLoggedInCustomer($session);
        $trans = Yii::app()->db->beginTransaction();
        if($customer->deductVoucher(25,'test deduct') && $customer->save())
            $trans->commit();
    }

}
?>
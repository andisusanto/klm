<?php
class BaseController extends Controller
{
        
    protected function checkLogIn($session)
    {
        if(!isset($session['currentCustomerEmail']))
            $this->redirect(array('site/signup'));
    }
    
    protected function getLoggedInCustomer($session)
    {
        $customer = Customer::model()->findByAttributes(array('Email'=>$session['currentCustomerEmail']));
        if($customer != null && !$customer->Banned)
        {
            return $customer;
        }
        else
        {
            if($customer == null)
            {
               throw new Exception('this account does not exist anymore!');
            }
            else
            {
               throw new Exception('your account has been locked');
            }
                
        }
    }
}
?>
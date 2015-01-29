<?php
    class Cart{
        private $cartitems;
        private $totalitems;
        
        function __construct(){
		    $this->cartitems = array();
	    }
        
        public function getCartItems()
        {
            return $this->cartitems;
        }
        
        public function getTotalItems()
        {
            return $this->totalitems;
        }
        
        public function addToCart($product,$quantity)
        {
            if($quantity < 0)
                break;
            $added = FALSE;
            $tmpCartItems = &$this->cartitems;
            foreach($tmpCartItems as $cartitem)
            {
                if($cartitem->product == $product)
                {
                    $cartitem->quantity += $quantity;
                    $added = TRUE;
                    break;
                }
            }
            if(!$added)
            {
                $newcartitem = new CartItem;
                $newcartitem->product = $product;
                $newcartitem->quantity = $quantity;
                $this->cartitems[] = $newcartitem;
            }
            $this->totalitems+=$quantity;
        }
        
        public function removeFromCart($product,$quantity)
        {
            if($quantity < 0)
                break;
            $cartItems = &$this->cartitems;
            foreach($cartItems as $key => $cartitem)
            {
                if ($cartitem->product == $product)
                {
                    if($cartitem->quantity < $quantity)
                    {
                        $quantity = $cartitem->quantity;
                    }
                    $this->totalitems -= $quantity;
                    $cartitem->quantity -= $quantity;
                    if($cartitem->quantity == 0)
                        unset($cartItems[$key]);
                }
            }            
        }
        
        public function editCartItemQuantity($product,$newquantity)
        {
            if($newquantity < 0)
                break;
            $processed = FALSE;
            $cartItems = &$this->cartitems;
            foreach($cartItems as $key => $cartitem)
            {
                if ($cartitem->product == $product)
                {
                    $this->totalitems -= $cartitem->quantity;
                    $cartitem->quantity = $newquantity;
                    $this->totalitems += $cartitem->quantity;
                    if($cartitem->quantity == 0)
                        unset($cartItems[$key]);
                    $processed = TRUE;
                }
            }
            if(!$processed)
            {
                $newcartitem = new CartItem;
                $newcartitem->product = $product;
                $newcartitem->quantity = $newquantity;
                $this->cartitems[] = $newcartitem;
                $this->totalitems+=$newquantity;
            }
        }
    }
?>
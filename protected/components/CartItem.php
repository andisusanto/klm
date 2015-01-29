<?php
    class CartItem{
        public $product;
        public $quantity;
        
        public function getProduct()
        {
            return Product::model()->findByPk($this->product);
        }
    }
?>
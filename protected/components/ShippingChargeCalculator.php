<?php
    class ShippingChargeCalculator
    {
        public static function GetShippingCharge($totalweight, $shippingagent, $shippingaddress)
        {
            if($totalweight < 0.5)
                $totalweight = 0.5;
            $customeraddress = CustomerAddress::model()->findByPk($shippingaddress);
            if($customeraddress == NULL)
                return 0;
            $shippingagentrate = ShippingAgentRate::model()->findByAttributes(array('ShippingAgent'=>$shippingagent,'City'=>$customeraddress->City));
            if ($shippingagentrate == NULL)
                return 0;
            $totalweight = $totalweight * 10;
            $totalweight = ceil($totalweight);
            $totalweight = $totalweight / 10.0;
            return $totalweight * $shippingagentrate->Rate;
        }
    }
?>
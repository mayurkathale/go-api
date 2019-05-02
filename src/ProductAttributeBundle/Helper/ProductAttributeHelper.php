<?php


namespace ProductAttributeBundle\Helper;

class ProductAttributeHelper
{
    private function getDates($days)
    {
        $array = array();
        $today = date('Y-m-d');
        //array_push($array, $today);
        for ($i=1; $i <=$days; $i++) {
            array_push($array, $date = date('Y-m-d', strtotime($today. "+".$i." day")));
            if ($this->checkIfSunday($date)) {
                $days++;
            }
        }
        return $array;
    }

    public function prepareDatePrice($data)
    {
        $datesArray = $this->getDates(8);
        $priceData = array();
        $percentage = array(50,30,15); //Production time Rule
        $percentageIndex = 0;
        foreach ($datesArray as $key => $date) {
            if ($percentageIndex >= count($percentage)) {
                //$priceData[$date] = $this->__prepareDatePrice($data, 0);
                $datePrices = $this->__prepareDatePrice($data, 0);
                foreach ($datePrices as $datePrice) {
                    $priceData[$datePrice['qty']][$date] = $datePrice['total_price'];
                }
                continue;
            }
            $appliedPercentage = $percentage[$percentageIndex];
            //$priceData[$date] = $this->__prepareDatePrice($data, $appliedPercentage);
            $datePrices = $this->__prepareDatePrice($data, $appliedPercentage);
            foreach ($datePrices as $datePrice) {
                $priceData[$datePrice['qty']][$date] = $datePrice['total_price'];
            }
            if ($this->checkIfSunday($date)) {
                continue;
            }
            $percentageIndex++;
        }
        return $priceData;
    }

    private function __prepareDatePrice($data, $appliedPercentage)
    {
        $dayPrice = array();
        foreach ($data as $index => $pricelist) {
            array_push($dayPrice, array(
                'production_cost' => ($pricelist->getPrice()/100) * $appliedPercentage,
                'price' =>  $pricelist->getPrice(),
                'total_price' =>  $pricelist->getPrice() + ($pricelist->getPrice()/100) * $appliedPercentage,
                'product_id' => $pricelist->getProductId(),
                'qty' => $pricelist->getQty()
            ));
        }
        return $dayPrice;
    }

    private function checkIfSunday($date)
    {
        return in_array(date("l", strtotime($date)), ["Sunday"]);
    }
}
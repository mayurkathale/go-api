<?php


namespace ProductAttributeBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ProductAttributeBundle\Entity\PaperFormat;
use ProductAttributeBundle\Entity\PaperType;
use ProductAttributeBundle\Entity\ProductPrice;

class ProductAttributeFixtures extends Fixture implements ORMFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $paperTypes = array('80g Art Paper','150g Art Paper', '250g Art Paper');
        $paperFormats = array('9 x 5.5 cm', '8.5 x 5 cm');
        $productPriceArray = array(
            '1' => array('100' => 110, '200' => 215, '300' => 310, '400' => 400),
            '2' => array('100' => 110, '200' => 215, '300' => 310, '400' => 400),
            '3' => array('100' => 110, '200' => 215, '300' => 310, '400' => 400),
            '4' => array('100' => 110, '200' => 215, '300' => 310, '400' => 400)
        );
        foreach ($paperTypes as $paperType) {
            $obj = new PaperType();
            $obj->setPaperType($paperType);
            $manager->persist($obj);
        }
        foreach ($paperFormats as $paperFormat) {
            $obj = new PaperFormat();
            $obj->setFormatLabel($paperFormat);
            $manager->persist($obj);
        }
        foreach ($productPriceArray as $productId => $priceArray) {
            foreach ($priceArray as $qty => $price) {
                $obj = new ProductPrice();
                $obj->setProductId($productId);
                $obj->setQty($qty);
                $obj->setPrice($price);
                $manager->persist($obj);
            }
        }
        $manager->flush();
    }
}

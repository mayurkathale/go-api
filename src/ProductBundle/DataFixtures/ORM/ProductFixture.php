<?php


namespace ProductBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ProductBundle\Entity\Product;

class ProductFixture extends Fixture implements ORMFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $products = array(
            array("name" => "Buisness Card"),
            array("name" => "Folded Buisness Card"),
            array("name" => "Spot Varnish Buisness Card"),
            array("name" => "Premium Buisness Card")
        );

        foreach ($products as $product) {
            $obj = new Product();
            $obj->setName($product["name"]);
            $manager->persist($obj);
        }
        $manager->flush();
    }
}

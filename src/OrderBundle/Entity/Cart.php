<?php
namespace OrderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cart")
 */
class Cart
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="integer",name="product_id")
     */
    private $productId;
    /**
     * @ORM\Column(type="integer",name="user_id")
     * @ORM\OneToOne(targetEntity="UserBundle\Entity\User",inversedBy="user")
     */
    private $userId;
    /**
     * @ORM\Column(type="integer",name="paper_type_id")
     * @ORM\OneToOne(targetEntity="ProductAttributeBundle\Entity\PaperType",inversedBy="paperType")
     */
    private $paperTypeId;
    /**
     * @ORM\Column(type="integer",name="paper_format_id")
     * @ORM\OneToOne(targetEntity="ProductAttributeBundle\Entity\PaperFormat",inversedBy="paperFormat")
     */
    private $paperFormatId;
    /**
     * @ORM\Column(type="integer",name="sides")
     */
    private $sides;
    /**
     * @ORM\Column(type="integer",name="qty")
     */
    private $qty;
    /**
     * @ORM\Column(type="datetime",name="production_date")
     */
    private $productionDate;
    /**
     * @ORM\Column(type="datetime",name="added_at")
     */
    private $addedAt;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param mixed $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getPaperTypeId()
    {
        return $this->paperTypeId;
    }

    /**
     * @param mixed $paperTypeId
     */
    public function setPaperTypeId($paperTypeId)
    {
        $this->paperTypeId = $paperTypeId;
    }

    /**
     * @return mixed
     */
    public function getPaperFormatId()
    {
        return $this->paperFormatId;
    }

    /**
     * @param mixed $paperFormatId
     */
    public function setPaperFormatId($paperFormatId)
    {
        $this->paperFormatId = $paperFormatId;
    }

    /**
     * @return mixed
     */
    public function getSides()
    {
        return $this->sides;
    }

    /**
     * @param mixed $sides
     */
    public function setSides($sides)
    {
        $this->sides = $sides;
    }

    /**
     * @return mixed
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * @param mixed $qty
     */
    public function setQty($qty)
    {
        $this->qty = $qty;
    }

    /**
     * @return mixed
     */
    public function getProductionDate()
    {
        return $this->productionDate;
    }

    /**
     * @param mixed $productionDate
     */
    public function setProductionDate($productionDate)
    {
        $this->productionDate = $productionDate;
    }

    /**
     * @return mixed
     */
    public function getAddedAt()
    {
        return $this->addedAt;
    }

    /**
     * @param mixed $addedAt
     */
    public function setAddedAt($addedAt)
    {
        $this->addedAt = $addedAt;
    }
}

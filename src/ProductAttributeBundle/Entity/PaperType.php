<?php
namespace ProductAttributeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaperFormat
 * @ORM\Entity
 * @ORM\Table(name="paper_type")
 */
class PaperType
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(name="paper_type",type="string",length=255)
     */
    private $paperType;

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
    public function getPaperType()
    {
        return $this->paperType;
    }

    /**
     * @param mixed $paperType
     */
    public function setPaperType($paperType)
    {
        $this->paperType = $paperType;
    }
}

<?php
namespace ProductAttributeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaperFormat
 * @ORM\Entity
 * @ORM\Table(name="paper_format")
 */
class PaperFormat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="format_label",type="string",length=255)
     */
    private $formatLabel;

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
    public function getFormatLabel()
    {
        return $this->formatLabel;
    }

    /**
     * @param mixed $formatLabel
     */
    public function setFormatLabel($formatLabel)
    {
        $this->formatLabel = $formatLabel;
    }
}

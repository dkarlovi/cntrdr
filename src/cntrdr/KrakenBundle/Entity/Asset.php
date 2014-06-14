<?php
namespace cntrdr\KrakenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="assets")
 */
class Asset
{
    /**
     * @ORM\Column(type="string", length=4, nullable=false)
     * @ORM\ID
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $type;

    /**
     * @ORM\Column(type="string", length=4)
     */
    protected $alias;

    /**
     * @ORM\Column(type="integer")
     */
    protected $decimals;

    /**
     * @ORM\Column(type="integer")
     */
    protected $display;

    /**
     * Set name
     *
     * @param string $name
     * @return Asset
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Asset
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set alias
     *
     * @param string $alias
     * @return Asset
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string 
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set decimals
     *
     * @param integer $decimals
     * @return Asset
     */
    public function setDecimals($decimals)
    {
        $this->decimals = $decimals;

        return $this;
    }

    /**
     * Get decimals
     *
     * @return integer 
     */
    public function getDecimals()
    {
        return $this->decimals;
    }

    /**
     * Set display
     *
     * @param integer $display
     * @return Asset
     */
    public function setDisplay($display)
    {
        $this->display = $display;

        return $this;
    }

    /**
     * Get display
     *
     * @return integer 
     */
    public function getDisplay()
    {
        return $this->display;
    }
}

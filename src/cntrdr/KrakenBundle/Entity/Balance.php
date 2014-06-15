<?php
namespace cntrdr\KrakenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="balance")
 */
class Balance
{
    /**
     * @ORM\ID
     * @ORM\Column(type="string", length=4)
     * @ORM\ManyToOne(targetEntity="Asset")
     */
    protected $asset;
    
    /**
     * @ ORM\ID
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    protected $created_at;

    /**
     * @ORM\Column(type="decimal", precision=15, scale=10)
     */
    protected $amount;

    /**
     * Set asset
     *
     * @param string $asset
     * @return Balance
     */
    public function setAsset($asset)
    {
        $this->asset = $asset;

        return $this;
    }

    /**
     * Get asset
     *
     * @return string 
     */
    public function getAsset()
    {
        return $this->asset;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Balance
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set amount
     *
     * @param string $amount
     * @return Balance
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string 
     */
    public function getAmount()
    {
        return $this->amount;
    }
}

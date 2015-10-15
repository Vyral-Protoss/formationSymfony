<?php

namespace ParkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ip
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ParkBundle\Entity\IpRepository")
 */
class Ip
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=15)
     */
    private $ip;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateAt", type="datetimetz")
     */
    private $updateAt;


    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    protected $description;

    /**
     * @ORM\OneToOne(targetEntity="Computer")
     * @ORM\JoinColumn(nullable=true)
     */
    private $computer;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return Ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     *
     * @return Ip
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Ip
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }


    public function __toString() {
        return $this->getIp();
    }


    /**
     * Set computer
     *
     * @param \ParkBundle\Entity\Computer $computer
     *
     * @return Ip
     */
    public function setComputer(\ParkBundle\Entity\Computer $computer = null)
    {
        $this->computer = $computer;

        return $this;
    }

    /**
     * Get computer
     *
     * @return \ParkBundle\Entity\Computer
     */
    public function getComputer()
    {
        return $this->computer;
    }
}

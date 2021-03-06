<?php

namespace ParkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ParkBundle\Entity\PersonRepository")
 */
class Person
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
     * @ORM\Column(name="firstname", type="string", length=50)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=50)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="age", type="string", length=3)
     */
    private $age;


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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Person
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Person
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    public function __toString()
    {
        return $this->getFirstname() . ' ' . $this->getLastname();
    }

    /**
     * @ORM\OneToMany(targetEntity="Computer", mappedBy="person")
     */
    protected $computers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->computers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add computer
     *
     * @param \ParkBundle\Entity\Computer $computer
     *
     * @return Person
     */
    public function addComputer(\ParkBundle\Entity\Computer $computer)
    {
        $this->computers[] = $computer;

        return $this;
    }

    /**
     * Remove computer
     *
     * @param \ParkBundle\Entity\Computer $computer
     */
    public function removeComputer(\ParkBundle\Entity\Computer $computer)
    {
        $this->computers->removeElement($computer);
    }

    /**
     * Get computers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComputers()
    {
        return $this->computers;
    }

    /**
     * Set age
     *
     * @param string $age
     *
     * @return Person
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return string
     */
    public function getAge()
    {
        return $this->age;
    }
}

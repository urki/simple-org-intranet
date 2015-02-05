<?php

namespace Muzej\SurveyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Muzej\UserBundle\Entity\User;

/**
 * Survey
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="climatic_survey")
 * @ORM\Entity(repositoryClass="Muzej\SurveyBundle\Entity\SurveyRepository")
 */
class Survey {

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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \Time
     *
     * @ORM\Column(name="time", type="time")
     */
    private $time;

    /**
     * @var \Date
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var float
     *
     * @ORM\Column(name="temperature", type="decimal")
     * @Assert\NotBlank(message="Enter temperature")
     * @Assert\Range(
     *      min = "-5",
     *      max = "60",
     *      minMessage = "Minimum is -5 degrees Celsius",
     *      maxMessage = "Maximum is 60 degrees Celsius"
     * )
     */
    private $temperature;

    /**
     * @var float
     *
     * @ORM\Column(name="moisture", type="decimal")
     * @Assert\NotBlank(message="Enter moisture")
     * @Assert\Range(
     *      min = "0",
     *      max = "100",
     *      minMessage = "Minimum is 0%",
     *      maxMessage = "Maximum is 100%"
     * )
     */
    private $moisture;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="text", nullable=true)
     */
    private $note;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Muzej\UserBundle\Entity\User")
     */
    protected $owner;

    public function getOwner() {
        return $this->owner;
    }

    public function setOwner(User $owner) {
        $this->owner=$owner;
    }

    public function getCreated_at() {
        return $this->created_at;
    }

    public function setCreated_at($created_at) {
        $this->created_at = $created_at;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreated_atValue() {
        $this->created_at = new \DateTime();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Survey
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     * @return Survey
     */
    public function setTime($time) {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime 
     */
    public function getTime() {
        return $this->time;
    }

    /**
     * Set temperature
     *
     * @param float $temperature
     * @return Survey
     */
    public function setDate($date) {
        $this->date = $date;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime 
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * Set temperature
     *
     * @param float $temperature
     * @return Survey
     */
    public function setTemperature($temperature) {
        $this->temperature = $temperature;

        return $this;
    }

    /**
     * Get temperature
     *
     * @return float 
     */
    public function getTemperature() {
        return $this->temperature;
    }

    /**
     * Set moisture
     *
     * @param float $moisture
     * @return Survey
     */
    public function setMoisture($moisture) {
        $this->moisture = $moisture;

        return $this;
    }

    /**
     * Get moisture
     *
     * @return float 
     */
    public function getMoisture() {
        return $this->moisture;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return Survey
     */
    public function setNote($note) {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote() {
        return $this->note;
    }

}

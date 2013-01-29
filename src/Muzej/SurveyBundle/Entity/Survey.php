<?php

namespace Muzej\SurveyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Survey
 *
 * @ORM\Table(name="climatic_survey")
 * @ORM\Entity(repositoryClass="Muzej\SurveyBundle\Entity\SurveyRepository")
 */
class Survey
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="datetime")
     */
    private $time;

    /**
     * @var float
     *
     * @ORM\Column(name="temperature", type="decimal")
     */
    private $temperature;

    /**
     * @var float
     *
     * @ORM\Column(name="moisture", type="decimal")
     */
    private $moisture;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="text", nullable=true)
     */
    private $note;


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
     * Set name
     *
     * @param string $name
     * @return Survey
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
     * Set time
     *
     * @param \DateTime $time
     * @return Survey
     */
    public function setTime($time)
    {
        $this->time = $time;
    
        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set temperature
     *
     * @param float $temperature
     * @return Survey
     */
    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;
    
        return $this;
    }

    /**
     * Get temperature
     *
     * @return float 
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * Set moisture
     *
     * @param float $moisture
     * @return Survey
     */
    public function setMoisture($moisture)
    {
        $this->moisture = $moisture;
    
        return $this;
    }

    /**
     * Get moisture
     *
     * @return float 
     */
    public function getMoisture()
    {
        return $this->moisture;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return Survey
     */
    public function setNote($note)
    {
        $this->note = $note;
    
        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }
}

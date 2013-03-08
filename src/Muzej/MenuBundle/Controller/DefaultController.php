<?php

namespace Muzej\MenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="main_menu")
     * @Template()
     * 
     */
    public function indexAction()
    {
        $name="uros";
        return $this->render('MenuBundle:Default:index.html.twig', array('name' => $name));
    }
    
    /**
     * @Route("/report_menu", name="report_menu")
     * @Template()
     * 
     */
    public function reportAction()
    {
        return $this->render('MenuBundle:Default:report.html.twig');
    }
     /**
     * @Route("/survey_menu", name="survey_menu")
     * @Template()
     * 
     */
    public function surveyAction()
    {
        return $this->render('MenuBundle:Default:survey.html.twig');
    }
}

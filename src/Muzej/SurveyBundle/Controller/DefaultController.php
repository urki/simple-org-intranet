<?php

namespace Muzej\SurveyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SurveyBundle:Default:index.html.twig', array('name' => $name));
    }
}

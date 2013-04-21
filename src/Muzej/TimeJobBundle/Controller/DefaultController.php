<?php

namespace Muzej\SurveyBundle\Controller;

use Muzej\SurveyBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SurveyBundle:Default:index.html.twig', array('name' => $name));
    }
}

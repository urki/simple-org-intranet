<?php

namespace Root\ExperimentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('RootExperimentBundle:Default:index.html.twig', array('name' => $name));
    }
}

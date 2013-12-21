<?php

namespace Andboson\RateBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AndbosonRateBundle:Default:index.html.twig', array('name' => $name));
    }
}

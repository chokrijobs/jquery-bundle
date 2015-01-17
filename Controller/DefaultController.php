<?php

namespace Schokri\JqueryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('JqueryBundle:Default:index.html.twig', array('name' => $name));
    }
}

<?php

namespace Schokri\JqueryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class JqueryController extends Controller
{
    public function indexAction()
    {
        return $this->render('JqueryBundle:Jquery:index.html.twig');
    }
}

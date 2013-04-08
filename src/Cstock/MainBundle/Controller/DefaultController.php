<?php

namespace Cstock\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CstockMainBundle:Default:index.html.twig', array('name' => $name));
    }
}

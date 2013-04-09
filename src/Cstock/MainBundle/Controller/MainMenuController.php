<?php

namespace Cstock\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainMenuController extends Controller
{

    public function indexAction() {
        return $this->render('CstockMainBundle:MainMenu:index.html.twig');
    }
}
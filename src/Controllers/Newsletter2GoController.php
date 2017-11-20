<?php

namespace Newsletter2Go\Controllers;


use Plenty\Plugin\Controller;
use Plenty\Plugin\Templates\Twig;

class Newsletter2GoController extends Controller
{
    public function test(Twig $twig):string
    {
        return $twig->render('Newsletter2Go::content.hello');
    }
}

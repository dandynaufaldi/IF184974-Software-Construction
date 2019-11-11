<?php

namespace Phalcon\RateIdea\Controllers\Web;

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class IndexController extends Controller
{
    public function indexAction()
    {
        return new Response("Test");
    }

}
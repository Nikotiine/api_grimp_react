<?php

namespace App\Controller;


use App\Service\NamingService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SpotNamingController extends AbstractController

{


    public function __construct(private NamingService $service)
    {
    }

    public function __invoke():array
    {

     return $this->service->getNaming();
    }


}
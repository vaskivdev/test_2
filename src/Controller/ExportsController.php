<?php

namespace App\Controller;
    
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ExportsRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ExportsController extends AbstractController
{
    /**
    * @Route("/exports", methods="POST")
    */
    public function exports(Request $request, ExportsRepository $repo)
    {
        $data = json_decode($request->getContent(), true);
        if (!key_exists('selectedLocale', $data)) {
            $data['selectedLocale'] = null;
        }
        
        $result = $repo->findAllSuitable($data['selectedLocale']);
        
        return new JsonResponse($result);
    }
    
    /**
    * @Route("/exports/locales", methods="GET")
    */
    public function locales(ExportsRepository $repo)
    {
        $result = $repo->findAllLocales();
        
        return new JsonResponse($result);
    }
}

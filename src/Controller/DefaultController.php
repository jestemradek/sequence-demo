<?php

namespace App\Controller;

use App\Form\SequenceType;
use App\Utils\Sequence;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
        $form = $this->createForm(SequenceType::class);
        
        return $this->render('default/index.html.twig', [
            'sequence_form' => $form->createView(),
        ]);
        
    }

    /** 
     * @Route("/ajax") 
     */ 
    public function ajaxAction(Request $request)
    {  
        $sequence = new Sequence();

        if ($request->isXMLHttpRequest() && $request->get('sequence_numbers'))
        {
            $data = explode(PHP_EOL, $request->get('sequence_numbers'));
            $output = [];
            foreach ($data as $value)
            {
                if($value != "")
                {
                    $value = (int)$value;
                    $output[] = ["input" => $value, "output" => $sequence->getHighestValue($value)];
                }
            }

            return $this->render('default/table.html.twig', [
                'rows' => $output,
            ]);
        }
        
        return new Response('Bad request!', 400);
    } 
}

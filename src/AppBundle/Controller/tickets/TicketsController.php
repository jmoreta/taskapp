<?php
/**
 * Created by PhpStorm.
 * User: Stephany Marmolejos
 * Date: 7/3/2018
 * Time: 10:17 PM
 */

namespace AppBundle\Controller\tickets;

use AppBundle\Entity\Tickets;
use AppBundle\Form\TicketsType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serialize;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class TicketsController extends Controller
{

    /**
     * @Route("/tickets",name="lista_tickets")
     */
    public function indexTicket()
    {
        $tickets = $this->getDoctrine()->getRepository(Tickets::class)
            ->findAll();

        return $this->render("@App/tickets/listado_tickets.html.twig",
            ["tickets" => $tickets]
        );
    }

    //Restfull API

    /**
     * @Route("/rest/tickets",name="nuevo_tickets",options={"expose"=true})
     * @Method("POST")
     */
    public function nuevoTicket(Request $request)
    {
        $data = $request->getContent();
        $data = json_decode($data, true);




        $tickets = new Tickets();
        $form = $this->createForm(TicketsType::class,$tickets);
        $form->submit($data);


        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tickets);
            $em->flush();
        }

        return new JsonResponse(null, 400);

    }





}
<?php
/**
 * Created by PhpStorm.
 * User: Stephany Marmolejos
 * Date: 7/3/2018
 * Time: 10:17 PM
 */

namespace AppBundle\Controller\tickets;

use AppBundle\Entity\Tickets;


use AppBundle\Entity\Usuario;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serialize;
use \DateTime;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class TicketsController extends Controller
{
//lista tickets en la vista

    /**
     * @Route("/tickets",name="lista_tickets")
     */
    public function indexTicket()
    {
        $tickets=$this->getDoctrine()->getRepository(Tickets::class)
            ->findAll();

        return $this->render("@App/tickets/listado_tickets.html.twig",
                ["tickets"=>$tickets]
            );

    }


}
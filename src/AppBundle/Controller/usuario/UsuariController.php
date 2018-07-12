<?php
/**
 * Created by PhpStorm.
 * User: Mitchell
 * Date: 6/11/2018
 * Time: 6:32 PM
 */

namespace AppBundle\Controller\usuario;

use AppBundle\Form\UsuarioType;
use AppBundle\Entity\Usuario;
use Sensio\bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class UsuariController extends Controller
{


    /**
     * @Route ("/rusuario",name="registro_usuario")
     */
    function registroUsuario(){

        return $this->render('@App\usuario\registrousuario.html.twig');

    }


    /**
     * @Route("/usuario",name= "vista_usuario")
     */
    public function indexUsuario()
    {
        $usuarios = $this->getDoctrine()
            ->getRepository(Usuario::class)
            ->findAll();

        return $this->render("@App/usuario/lista_usuarios.html.twig", ["usuarios" => $usuarios]);
    }


    /**
     * @Route("/usuario/{id}",name= "editar_usuario")
     * @Method ("GET")
     * @param Usuario $usuarios
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexEditUsuario(Usuario $usuarios)
    {

        return $this->render("@App/usuario/editar_usuario.html.twig",
            ["usuario" => $usuarios]);
    }



    /**
     * @Route("rest/usuario/{id}",name= "eliminar_usuario",options={"expose"=true})
     * @Method ("DELETE")
     * @param Usuario $usuarios
     * @return \Symfony\Component\HttpFoundation\Response
     */
   public function indexEliminarUsuario(Usuario $usuarios)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($usuarios);
        $em->flush();


        return $this->redirectToRoute('vista_usuario');
    }


    //Restful API


    /**
     * @Route ("/rest/usuario",name="busca_usuario",options={"expose"=true})
     * @Method ("GET")
     */
    public function buscarUsuarios()
    {

        return null;
    }

    /**
     * @Route ("/rest/usuario/{id}",name="buscar_usuario",options={"expose"=true})
     * @Method("GET")
     * @param Usuario $usuario
     */
    public function buscarUsuario(Usuario $usuario)
    {
        //$encoders = array(new JsonEncode());
        //$normalizers = array(new ObjectNormalizer());
       // $serializer = new Serializer($normalizers, $encoders);

        $jsonContent = $this->get("serializer")->serialize($usuario, 'json');
        $jsonContent = json_decode($jsonContent, true);

        return new JsonResponse($jsonContent);
    }

    /**
     * @Route("/rest/usuario",name="guardar_usuario",options={"expose"=true})
     * @Method("POST")
     */
   public function guardarUsuario(Request $request)
    {
        $data = $request->getContent();
        $data = json_decode($data, true);


        $usuario = new Usuario();
        $form=$this->createForm(UsuarioType::class,$usuario);
        $form->submit($data);


        if ($form->isValid()){
        $em = $this->getDoctrine()->getManager();
        $em->persist($usuario);
        $em->flush();

        }else

        return new JsonResponse(null,400);

        }


    /**
     * @Route("/rest/usuario/{id}",name="actualizar_usuario",options={"expose"=true})
     * @Method("PUT")
     * @param Request $request
     * @param Usuario $usuario
     * @return JsonResponse
     */
    public function actualizarUsuario(Request $request, Usuario $usuario)
    {

        $data = $request->getContent();
        $data = json_decode($data, true);

        $form=$this->createForm(UsuarioType::class,$usuario);
        $form->submit($data);


        $em = $this->getDoctrine()->getManager();
        $em->flush();

        $jsonContent = $this->get("serializer")->serialize($usuario, 'json');

        //$jsonContent=$serializer->Serialiaze($usuario,'json');
        $jsonContent = json_decode($jsonContent, true);


        return new JsonResponse($jsonContent);
        return null;

    }


}
<?php
/**
 * Created by PhpStorm.
 * User: Mitchell
 * Date: 6/25/2018
 * Time: 6:28 PM
 */

namespace AppBundle\Services;




use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class Helpers
{
    public function json($data){

        $encoders=array(new JsonEncoder());
        $normalizer=array(new ObjectNormalizer());
        $serializer=new Serializer($normalizer,$encoders);
        $jsonContent=json_decode($serializer->serialize($data,'json' ),true );
        return $jsonContent;
    }

}
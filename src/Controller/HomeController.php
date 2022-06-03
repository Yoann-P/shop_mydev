<?php

namespace App\Controller;

use App\Classe\Mail;
use App\Entity\Header;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RequestStack;

class HomeController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager, RequestStack $requestStack)
    {
        $this->entityManager = $entityManager;
        $this->requestStack = $requestStack;
    }



    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $isBest = $this->entityManager->getRepository(Product::class)->findByIsBest(1);
        $products = $this->entityManager->getRepository(Product::class)->findByIsBest(0);
        $productsTotal = $this->entityManager->getRepository(Product::class)->findAll();
        $headers = $this->entityManager->getRepository(Header::class)->findAll();
        if(isset($_COOKIE['theme'])){
            $cookieTheme = $_COOKIE['theme'];

        }else{
            $cookieTheme = null;
        }
     
        if(isset($cookieTheme)){

        }else{
            setcookie('theme', 0 ,strtotime('+1 year'));
        }


        return $this->render('home/index.html.twig', [
            'products' => $products,
            'productsTotal' => $productsTotal,
            'isBest' => $isBest,
            'headers' => $headers,
            'cookieTheme' => $cookieTheme,
        ]);
    }

    /**
     * @Route("/validation-email-inscription", name="validation_email_inscription")
     */
    public function validationEmailInscription(): Response
    {
        return $this->render('home/validation-email-inscription.html.twig');
    }
}

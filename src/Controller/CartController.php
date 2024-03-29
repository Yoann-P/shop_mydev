<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{

    private $entityManager;
    private $qte = 1;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/mon-panier", name="cart")
     */
    public function index(Cart $cart): Response
    {

        return $this->render('cart/index.html.twig', [
            'cart' => $cart->getFull(),
        ]);
    }

    /**
     * @Route("/cart/add/{id}", name="add_to_cart")
     */
    public function add(Cart $cart, $id): Response
    {
        if (isset($_GET['qte'])) {
            $qte = $_GET['qte'];
            if (!is_numeric($qte)) {
                die;
            }
        } else {
            $qte = 1;
        }
        $cart->add($id, $qte);
        return $this->redirectToRoute('products');
    }

    /**
     * @Route("/cart/remove", name="remove_my_cart")
     */
    public function remove(Cart $cart): Response
    {
        $cart->remove();
        return $this->redirectToRoute('products');
    }

    /**
     * @Route("/cart/delete/{id}", name="delete_to_cart")
     */
    public function delete(Cart $cart, $id): Response
    {
        $cart->delete($id);
        return $this->redirectToRoute('cart');
    }

    /**
     * @Route("/cart/decrease/{id}", name="decrease_to_cart")
     */
    public function decrease(Cart $cart, $id): Response
    {
        $cart->decrease($id);
        return $this->redirectToRoute('cart');
    }
}

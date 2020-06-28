<?php

namespace App\Controller;

use App\Entity\Cart;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;

class ShoppingCartController extends AbstractController
{
    private $entityManager;
    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;


    public function __construct(EntityManagerInterface $entityManager, UrlGeneratorInterface $urlGenerator)
    {
        $this->entityManager = $entityManager;
        $this->urlGenerator = $urlGenerator;
    }
    /**
     * @Route("/shopping/cart", name="shopping_cart")
     */
    public function index()
    {
        $lastUserShoppingCart = $this->getUserShoppingCart();
        return $this->render('shopping_cart/index.html.twig', [
            'USER' => $lastUserShoppingCart,
        ]);
    }

    private function getUserShoppingCart()
    {
        $userShopCart = $this->entityManager->getRepository(Cart::class)->findOneBy(['UserId' => $_COOKIE['userId']]);
        return $userShopCart;
    }
}

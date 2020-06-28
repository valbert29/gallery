<?php

namespace App\Controller;

use App\Entity\Cart;
use App\Entity\Goods;
use App\Form\GoodsType;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;

class GoodsController extends AbstractController
{
    /**
     * @Route("/goods", name="goods")
     */
    public function index()
    {
        return $this->render('goods/index.html.twig', [
            'controller_name' => 'GoodsController',
        ]);
    }

    /**
     * @Route("/addGood", name="addGood")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addGood(Request $request)
    {
        $good = new Goods();

        $form = $this->createForm(GoodsType::class, $good);
        $form->handleRequest($request);
        $this->validate($form);
        if ($form->isSubmitted() && $form->isValid()) {

            // Save
            $em = $this->getDoctrine()->getManager();
            $em->persist($good);
            $em->flush();

            return $this->redirectToRoute('goods');
        }
        return $this->render('goods/addGood.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function validate(FormInterface $form)
    {
        $goods = $form->getData();

        if ($goods->getCount()<0) {
            $form->addError(new FormError('Количество не может быть меньше 0'));
            throw new CustomUserMessageAuthenticationException('Количество не может быть меньше 0');
        }
        if ($goods->getPrice()<0) {
            throw new CustomUserMessageAuthenticationException('Цена не может быть меньше 0');
        }
        if ($goods->getDiscount()<0 || $goods->getDiscount()>100) {
            throw new CustomUserMessageAuthenticationException('Скидка должна быть в диапазоне от 0 до 100');
        }
    }




}

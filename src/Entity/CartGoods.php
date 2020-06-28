<?php

namespace App\Entity;

use App\Repository\CartGoodsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CartGoodsRepository::class)
 */
class CartGoods
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $CartId;

    /**
     * @ORM\Column(type="integer")
     */
    private $GoodId;

    /**
     * @ORM\Column(type="integer")
     */
    private $Count;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCartId(): ?int
    {
        return $this->CartId;
    }

    public function setCartId(int $CartId): self
    {
        $this->CartId = $CartId;

        return $this;
    }

    public function getGoodId(): ?int
    {
        return $this->GoodId;
    }

    public function setGoodId(int $GoodId): self
    {
        $this->GoodId = $GoodId;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->Count;
    }

    public function setCount(int $Count): self
    {
        $this->Count = $Count;

        return $this;
    }
}

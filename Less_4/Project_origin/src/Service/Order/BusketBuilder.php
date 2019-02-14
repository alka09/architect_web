<?php

namespace Service\Order;

use Service\Billing\IBilling;
use Service\Communication\ICommunication;
use Service\Discount\IDiscount;
use Service\User\ISecurity;
use Model\Entity\Product;

class BusketBuilder
{
    /**
     * @var IBilling
     */
    private $billing;

    /**
     * @var IDiscount
     */
    private $discount;

    /**
     * @var ICommunication
     */
    private $communication;

    /**
     * @var ISecurity
     */
    private $secutiry;

    /**
     * @var Product
     */
    private $products;

    /**
     * @return Product
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param Product[] $products
     * @return BascetBuilder
     */
    public function setProducts(array $products): BasketBuilder
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @return IBilling
     */
    public function getBilling(): IBilling
    {
        return $this->billing;
    }

    /**
     * @param IBilling $billing
     * @return BasketBuilder
     */
    public function setBilling(IBilling $billing): BasketBuilder
    {
        $this->billing = $billing;
        return $this;
    }

    /**
     * @param IDiscount $discount
     * @return BasketBuilder
     */
    public function setDiscount(IDiscount $discount): BasketBuilder
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @param ICommunication $communication
     * @return BasketBuilder
     */
    public function setCommunication(ICommunication $communication): BasketBuilder
    {
        $this->communication = $communication;
        return $this;
    }

    /**
     * @return ISecurity
     */
    public function getSecurity(): ISecurity
    {
        return $this->secutiry;
    }

    /**
     * @param ISecurity $security
     * @return BasketBuilder
     */
    public function setSecurity(ISecurity $security): BasketBuilder
    {
        $this->secutiry = $security;
        return $this;
    }

    /**
     * @return CheckoutProcess
     */
    public function build(): CheckoutProcess
    {
        return new CheckoutProcess($this);
    }
}
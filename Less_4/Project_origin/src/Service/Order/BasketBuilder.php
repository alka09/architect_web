<?php

namespace Service\Order;

use Service\Billing\Payer;
use Service\Billing\IBilling;
use Service\Communication\ICommunication;
use Service\Communication\Connunicator;
use Service\Discount\Discounter;
//use Service\Discount\DiscountWay\IDiscount;
use Service\Discount\IDiscount;
use Service\User\ISecurity;
use Model\Entity\Product;

class BasketBuilder
{
    private $payer;
    private $discounter;
    private $communicator;
    private $security;
    private $productsInBasket;
    /**
     * @param mixed $payer
     */
    public function setPayer (IBilling $payer): void
    {
        $this->payer = new Payer();
        $this->payer->setPayer($payer);
    }
    /**
     * @param mixed $discounter
     */
    public function setDiscounter (IDiscount $discounter): void
    {
        $this->discounter = new Discounter();
        $this->discounter->setDiscounter($discounter);
    }
    /**
     * @param mixed $communicator
     */
    public function setCommunicator (ICommunication $communicator): void
    {
        $this->communicator = new Communicator();
        $this->communicator->setCommunicator($communicator);
    }
    /**
     * @param mixed $security
     */
    public function setSecurity (ISecurity $security): void
    {
        $this->security = $security;
    }
    /**
     * @param mixed $productsInBasket
     */
    public function setProductsInBasket ($productsInBasket): void
    {
        $this->productsInBasket = $productsInBasket;
    }
    /**
     * @return mixed
     */
    public function getPayer ()
    {
        return $this->payer;
    }
    /**
     * @return mixed
     */
    public function getDiscounter ()
    {
        return $this->discounter;
    }
    /**
     * @return mixed
     */
    public function getCommunicator ()
    {
        return $this->communicator;
    }
    /**
     * @return mixed
     */
    public function getSecurity ()
    {
        return $this->security;
    }
    /**
     * @return mixed
     */
    public function getProductsInBasket ()
    {
        return $this->productsInBasket;
    }
}
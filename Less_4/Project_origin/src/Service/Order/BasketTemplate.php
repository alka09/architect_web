<?php

namespace Service\Order;

abstract class BasketTemplate
{

    final public function basketTemplateMethod(): void
    {
        $this->addProduct();
        $this->getDiscount();
        $this->getUser();
        $this->checkout();
    }

    abstract protected function addProduct();

    abstract protected function getDiscount();

    abstract protected function getUser();

    abstract protected function checkout();

}
<?php

namespace Service\Order;

use Model\Entity\Product;

class GetOrder
{
    private $basketBuilder;
    /**
     * OrderProcess constructor.
     *
     * @param $basketBuilder
     */
    public function __construct (BasketBuilder $basketBuilder)
    {
        $this->basketBuilder = $basketBuilder;
    }
    public function orderProcess ()
    {
        $totalPrice = 0;
        $basket = $this->basketBuilder;
        /**
         * @var Product $product
         */
        foreach ($basket->getProductsInBasket() as $product) {
            $totalPrice += $product->getPrice();
        }
        $discount = $basket->getDiscounter()
            ->getDiscount();
        $totalPrice = $totalPrice - $totalPrice / 100 * $discount;

        $basket->getPayer()->pay($totalPrice);
        $user = $basket->getSecurity()
            ->getUser();

        $basket->getCommunicator()
            ->process($user, 'checkout_template');
    }

}
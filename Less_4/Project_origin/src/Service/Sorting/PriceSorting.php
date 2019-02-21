<?php

namespace Service\Sorting;


class PriceSorting implements ISorting
{
    /**
     * @param array $items instenceof
     *
     * @return array
     */
    public function sort (array $items)
    {
        $count = count($items);
        for ($i = 0; $i < $count; $i++) {
            for ($j = $i + 1; $j < $count; $j++) {
                if ($items[$i]->getPrice() > $items[$j]->getPrice()) {
                    $temp = $items[$j];
                    $items[$j] = $items[$i];
                    $items[$i] = $temp;
                }
            }
        }
        return $items;
    }
}
<?php

namespace Service\Sorting;


class ProductSorter
{
    public function sort (ISorting $sorter, array $items)
    {
        return $sorter->sort($items);
    }
}
<?php

namespace App\Services;

class BubbleSort implements BubbleSortInterface
{
    public function sort(array $elements): array
    {
        $count = count($elements);

        for ($i = 0; $i < $count; $i++)
        {
           for ($j = 1; $j < $count - $i; $j++)
           {
            if ($elements[$j] > $elements[($j + 1)])
            {
                list($elements[$j], $elements[($j + 1)]) = array($elements[($j + 1)], $elements[$j]);
            }
           }
        }

        return $elements;
        
    }
}
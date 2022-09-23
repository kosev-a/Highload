<?php

namespace App\Http\Controllers;

use App\Services\BubbleSortInterface;
use Illuminate\Routing\Controller as BaseController;
use Psr\Log\LoggerInterface;
use Throwable;

class BubbleSortController extends BaseController
{
    public function __construct(
        private LoggerInterface $logger,
        private BubbleSortInterface $bubbleSort
    ) {

    }


    public function list()
    {
        try {
            $inputArray = [1, 4, 1, 3, 13, 47, 1, 67, 34, 21];

            $timeStart = time();

            $this->bubbleSort->sort($inputArray);

            $timeEnd = time();
            
            $this->logger->debug($timeEnd - $timeStart);
            $this->logger->debug(memory_get_usage());
        }catch (Throwable $exception)
        {
            $this->logger->error('Здесь были ошибки: ' . $exception->getMessage());
        }
    }
}
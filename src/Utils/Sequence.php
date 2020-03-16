<?php

namespace App\Utils;

class Sequence
{
    private $cache = [];

    private function sequence(int $n) : int
    {
        if ($n == 0)
        {
            return 0;
        }
        elseif ($n == 1)
        {
            return 1;
        }
        elseif ($n % 2 == 0)
        {
            $i = $n / 2;
            if (!isset($this->cache[$i]))
            {
                $this->cache[$i] = $this->sequence($i);
            } 
            return $this->cache[$i];
        }
        else
        {
            $i = ($n - 1) / 2;
            $j = $i + 1;
            if (!isset($this->cache[$i]))
            {
                $this->cache[$i] = $this->sequence($i);
            }
            if (!isset($this->cache[$j]))
            {
                $this->cache[$j] = $this->sequence($j);
            }
            return $this->cache[$i] + $this->cache[$j];
        }   
    }

    public function getHighestValue(int $n) : int
    {
        $result=0;
        for ($i = 0 ; $i <= $n ; $i++)
        {
            if ($this->sequence($i) > $result)
            {
                $result = $this->sequence($i);
            }
        }
        return $result;
    }

    public function getHighestValueArray(array $numbers) : array
    {
        $array=[];
        foreach($numbers as $n)
        {
            $result=0;
            for ($i = 0 ; $i <= $n ; $i++)
            {
                if ($this->sequence($i) > $result)
                {
                    $result = $this->sequence($i);
                }
            }
            $array[]=[$n, $result];
        }
        return $array;
    }
}
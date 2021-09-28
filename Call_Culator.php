<?php

namespace Interview;

class CallCulator
{
    private int $sum = 0;

    public function calculate(int $num1, string $operator, string $num2)
    {
        $num1 = intval($num1);
        $num2 = intval($num2);

        if($operator == 'divide') {
            return $this->divide_by($num1, $num2);
        } elseif($operator == 'sum') {
            return $num1 + $num2;
        } elseif($operator == 'multiply') {
            return $this->multiply($num1, $num2);
        } elseif($operator == 'sequencesum') {
            $this->sequenceSum($num1, $num2);
            return $this->sum;
        } else {
            print 'Operation not implemented' . PHP_EOL;
        }

    }

    private function divide_by(int $num1, int $num2): ?string
    {
        if($num2 == 0) {
            print 'Can'. "'". 't divide ' . $num2 . ' by 0' . "\n";
            print "General error\n";
            return null;
        }

        return $num1 / $num2;
    }

    private function multiply(int $num1, int $num2)
    {
        return $num1 * $num2;
    }

    /**
     * Generate sequence by formula F(pos, multiplier) = F(pos-1) + pos * multiplier
     * F(0, X) = 0;
     * F(1, X) = 0 + (1 * X)
     * F(2, X) = 0 + (1 * X) + (0 + (1 * X) + (2 * X))
     * ........
     * this function returns sum of sequence and prints elements
     * Example:
     * $sequenceLength = 0
     * $num2 = 111
     * sum: 0
     *
     * Example 2:
     * $sequenceLength 1
     * $num2 = 4
     * sum: 4
     *
     * Example 3:
     * $sequenceLength 1
     * $num2 = 0.1
     * sum: 0.1
     */
    private function sequenceSum(int $sequenceLength,  $num2)
    {
        $current = 0;
        $elements = [];
        $elements[] = $current;

        for($i = 0; $i <= $sequenceLength; $i++) {
            $current = $current + $i * $num2;
            $elements[] = $current;
            $this->sum = $this->sum + $current;
        }

        $print = '';
        foreach($elements as $element) {
            $print .= ',' . $element;
        }

        print trim($print, ',') . "\n\r";
        return $this->sum;
    }
}
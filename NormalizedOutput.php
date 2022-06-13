<?php

/**
 * NormalizedOutput
 * Normalized output sequence of numbers in the console
 * @author andersenbel
 */
class NormalizedOutput {
    /**
     * Number of screen chars
     * 
     * @var float 
     */
    private $numberConsoleChars;

    function __construct($numberConsoleChars, $char = '*') {
        $this->setnumberConsoleChars($numberConsoleChars - 1);
        $this->setChar($char);
    }

    public function setnumberConsoleChars($numberConsoleChars = 80) {
        $this->numberConsoleChars = $numberConsoleChars;
    }

    public function getNumberConsoleeChars() {
        return $this->numberConsoleChars;
    }

    public function setChar($char = '*') {
        $this->char = $char;
    }

    public function getChar() {
        return $this->char;
    }

    /**
     * 
     * outNormalized 
     * 
     * @param  array - array of float numbers
     */
    public function outNormalized(&$inputSet = []) {
        $precision = 0;
        foreach ($inputSet as $one) {
            if (is_float($one)) {
                if (strlen(substr(strrchr(strval($one), "."), 1)) > $precision) {
                    $precision = strlen(substr(strrchr(strval($one), "."), 1));
                }
            } else {
                throw new Exception("Error: $one is not float, exit!\n");
            }
        }
        $precision = pow(10, $precision);
        $maxInput = max($inputSet) * $precision;
        $minInput = min($inputSet) * $precision;
        $dx = ($maxInput - $minInput) / $this->getNumberConsoleeChars();
        $patternStr = '';
        for ($i = 0; $i < $this->getNumberConsoleeChars() + 1; $i++) $patternStr .= ' ';
        foreach ($inputSet as $in) {
            if (is_float($in)) {
                $one = round(($in * $precision - $minInput) / $dx) + 1;
                $new_line = substr($patternStr, 0, $one - 1) . $this->getChar() . substr($patternStr, $one);
                echo "$new_line\n";
            }
        }
        return true;
    }
}

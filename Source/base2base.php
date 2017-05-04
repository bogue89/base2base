<?php
/*
	Declaration: php function
	Lets make sure is not already define, and define the function
*/
if (!function_exists('base2base')) {
/*
	GLOBAL CONSTANTS:
	
    define B2B_NUMBERS: standar base 10
    define B2B_HEX: standar hexadecimal base
    define B2B_ALPHALOWER: alphabet values in lowercase with asc order base
    define B2B_ALPHAUPPER: alphabet values in uppercase with asc order base
    define B2B_ALPHANUM: alpha-numeric values in both lower and upper case with custom order base
*/
    define("B2B_NUMBERS", "0123456789");
    define("B2B_HEX", "0123456789ABCDEF");
    define("B2B_ALPHALOWER", "abcdefghijklmnopqrstuvwxyz");
    define("B2B_ALPHAUPPER", "ABCDEFGHIJKLMNOPQRSTUVWXYZ");
    define("B2B_ALPHANUM", "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ");
    
/*
	Function: base2base
	
	Convert the input into a string equivalent of the declare bases
	
	Parameters:
	
	in - The input string.
	inBase - The input base (is define as numbers if isn't declare.
	outBase - The output base (is define as alphanumeric if isn't declare.
	
	Returns:
	
	The string output base representation of the base input string
*/
    function base2base($in = "", $inBase = B2B_NUMBERS, $outBase = B2B_ALPHANUM)
    {
        $out = "";
        $in .= "";
        $inBase .= "";
        $outBase .= "";
        
        $splitregex = '/(?<=,|^)([^,]*)(,\1)+(?=,|$)/';
        
        $inCharset = array_reverse(preg_split('//', preg_replace($splitregex, '', $in), -1, PREG_SPLIT_NO_EMPTY));
        $inLenght  = count($inCharset);
        
        $inBaseCharset = array_flip(array_values(array_unique(preg_split('//', preg_replace($splitregex, '', $inBase), -1, PREG_SPLIT_NO_EMPTY))));
        $inBaseLenght  = count($inBaseCharset);
        
        $outBaseCharset = array_values(array_unique(preg_split('//', preg_replace($splitregex, '', $outBase), -1, PREG_SPLIT_NO_EMPTY)));
        $outBaseLenght  = count($outBaseCharset);
        
        $inValue = 0;
        foreach ($inCharset as $n => $c) {
            $value = $inBaseCharset[$c] * bcpow($inBaseLenght, $n);
            $inValue += $value;
        }
        
        $out = $inValue > 0 ? "" : substr($outBase, 0, 1);
        if ($outBaseLenght > 1) {
            while ($inValue) {
                $r       = $inValue % $outBaseLenght;
                $out     = $outBaseCharset[$r] . $out;
                $inValue = floor($inValue / $outBaseLenght);
            }
        }
        
        return $out;
    }
}
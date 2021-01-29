<?php
// Напишите программу на PHP для вывода первых 64 чисел Фибоначчи.
function fibonacci($n)
{
    $int = [0,1];
    
    for ($i=1; $i < $n ; $i++) { 
        $mass = $int[$i - 1] ;
        $mass2 = $int[$i];
        $mass3 = $mass + $mass2;
        array_push( $int , $mass3);
        
    }
    return $int;
}
print_r(fibonacci(11));


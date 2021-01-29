<?php
// Задание 3
// Реализовать на PHP структуру классов, описывающих следующие фигуры: прямоугольник, круг, треугольник.
// Описать функцию для нахождения площади фигуры.
// Реализовать:

// генерацию случайных объектов классов с заполнением полей случайными значениями
// сохранение объектов в файл в любом удобном представлении
// получение объектов из файла

// Отсортировать полученную коллекцию объектов по убыванию площади фигуры и вывести результат на экран.

class figure
{
    public  function record_file()
    {
        if (file_exists("area.txt")){
                $name_figure = $this->s.' :'.get_class($this).'/';
				$area_record_file = fopen("area.txt", 'a') or die("не удалось создать файл");
				fwrite($area_record_file, $name_figure .PHP_EOL );
				fclose($area_record_file);
		}else {
                $name_figure =  $this->s.' :'.get_class($this).'/';
                $area_record_file = fopen("area.txt", 'w+') or die("не удалось подключится файл");
                fwrite($area_record_file, $name_figure.PHP_EOL);
                fclose($area_record_file);
		}
    }

    public  function get_file()
    {
        $homepage =  file_get_contents('area.txt');
        $mass = [];
        $mass = explode('/' , $homepage);
        natcasesort($mass);
        $as = array_reverse($mass);
        for ($i=0; $i < count($as); $i++) { 
            print_r($as[$i].'<br>');
        }
    }
}

class triangle extends figure
{
    public  function area($a,$h){
        $this->s = $a * $h / 2;
        return  $this;
    }
}

class circle extends figure
{
    public  function area($a){
        $this->s =  3.14 * $a * $a;
        return  $this;
    }
}

class rectangle extends figure
{
    public  function area($a,$b){
        $this->s = $a * $b;
        return  $this;
    }
}


$triangle = new triangle;
$triangle->area(rand(1,20),rand(1,20))->record_file();

$circle = new circle;
$circle->area(rand(1,20))->record_file();

$rectangle = new rectangle;
$rectangle->area(rand(1,20),rand(1,20))->record_file();


$exit_file = new figure;
$exit_file->get_file();


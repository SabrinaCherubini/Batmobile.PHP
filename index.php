<?php
//  Rivedere la lezione
//  - Recap 
//  - Replicare la batmobile vista a lezione

// Batmobile composta da una parte anteriore con lo scopo di attaccare 
//  una parte posteriore con lo scopo di difendere


class Batmobile
{
    public $parteAnteriore;
    public $partePosteriore;

    public function __construct(ParteAnteriore $_parteAnteriore, PartePosteriore $_partePosteriore)
    {
        $this->parteAnteriore = $_parteAnteriore;
        $this->partePosteriore = $_partePosteriore;
    }

    public function tastoAttacco()
    {
        $this->parteAnteriore->attacca();
    }

    public function tastoDifesa()
    {
        $this->partePosteriore->difesa();
    }
}

$batman1 = new Batmobile(new Razzi, new Scudo); // salvo due ogg. a batman1 
// var_dump($batman1);

$batman1->tastoDifesa();

abstract class ParteAnteriore
{ // astratta la funzione si specifica nella sottoclasse 
    abstract public function attacca();
}

class Razzi extends ParteAnteriore
{
    public $spari = 5;
    public function attacca()
    {
        if ($this->spari > 0) {
            echo "bang bang \n ";
            $this->spari--;
        } else {
            echo "Hai  $this->spari  spari  GAME OVER ";
        }


    }
}




class Laser extends ParteAnteriore
{
    public $color;
    public function __construct($_color){
        $this->color=$_color;
    }
    public function attacca()
    {

        echo "ti spezzo in 2 con il laser $this->color \n";
    }

}

$batman2=new Batmobile(new Laser("red"), new Turbo);
var_dump($batman2);
// $batman2->parteAnteriore->attacca();
$batman2->tastoAttacco();

abstract class PartePosteriore
{

    abstract public function difesa();
}

class Scudo extends PartePosteriore
{
    public function difesa()
    {
        echo " non mi fai niente muahah \n";
    }

}

class Turbo extends PartePosteriore
{
     public $velocità=0;

    public function difesa()
    {
        if($this->velocità<100){
            echo " schivo tutto ! \n ";
            $this->velocità+=20;
    
        }
        else{
            echo"il turbo si è surriscaldato placati \n";
        }
        
        
    }
}


$batman1->tastoAttacco();
$batman1->tastoAttacco();
$batman1->tastoAttacco();
$batman1->tastoAttacco();
$batman1->tastoAttacco();
$batman1->tastoAttacco();

$batman2->tastoDifesa();
$batman2->tastoDifesa();
$batman2->tastoDifesa();
$batman2->tastoDifesa();
$batman2->tastoDifesa();
$batman2->tastoDifesa();
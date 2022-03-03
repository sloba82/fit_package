<?php 
namespace Fit;


class PasswordGenerator{

    private $characters = [
        'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
        'abcdefghijklmnopqrstuvwxyz',
        '2345',
        '!#$%&(){}[]='
    ];

    private $length;
    private $strength;

    public function generatePassword($lenght, $strength)
    {   
        if($lenght <= 6){
            $lenght = 6;
        }
        $this->length = $lenght;
        $this->strength = $strength;

        return $this->recursionString();
    }

    private function recursionString($strLength = null,  $string = '')
    {

        $loop = 1 +  $this->strength;
        for ($i = 0; $i < $loop; $i++) {
            $string .= $this->takeRandomCharacterFromString($this->characters[$i]);
        }
        
        $strLength = strlen($string);
      
        if($this->length > $strLength){
          return $this->recursionString($strLength,  $string);
        }

        $remain = strlen($string) - $this->length;
        if($remain > 0){
            return substr($string, 0, -$remain); 
        }
        
        return $string;
       
    }

    private function takeRandomCharacterFromString($character)
    {
        return $character[rand(0, strlen($character)-1)];
    }

}

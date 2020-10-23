<?php

include_once("./library/MysteryGame.php");


/**
 * Game
 */
class Game extends MysteryGame
{
  public function generateMystery()
  {
  /*
 // This part creates a text mystery.

    $content=file_get_contents('./db/text.txt');
    $words=explode('.',$content);
    $word= $words[mt_rand(0,count($words)-1)];
    $myMystery=$this->shuffleString($word) ;
  
    $this->mystery = [
      "mystery" => ($myMystery) ,
      "answer" => $word
    ];
*/
  
 //line 28 to 42 to create a simple 4*4 sudoku. 
//create a solved array of sudoku.
$myMystery=$this->createSudo();

// Randomly delete some array elements and replace them with letters.
list($myMystery,$answer)=$this->sudoAnswer($myMystery);
  $sudo='';
  for($i=0;$i<=count($myMystery);$i++){
    $sudo.=implode('',(array)$myMystery[$i])."<br>";

  }
  // provide a mystery and answers.
$this->mystery = [
      "mystery" =>$sudo,
      "answer" => implode('',(array)$answer)
    ];

  }

  public function shuffleString($str){

    $letters=str_split($str);
    shuffle($letters);
    
    return implode('',$letters);

  }
  public function createSudo(){
   
        $random=range(1,4);
        shuffle($random);
        
        for ($i=0;$i<=3;$i++)
        {
          $arr[$i]=array($random[2],$random[3],$random[1],$random[0]);
          $random=$arr[$i];
        }
    return $arr;
  }
  
  public function sudoAnswer($arr){
    $a=[];
    for ($i=0;$i<=3;$i++){
      $random=floor(mt_rand(1,3));
      array_push($a,$arr[$i][$random]);
      
      switch($i){
       case 0:{
        
        $arr[$i][$random]='A';
        
       break;
      } 
       case 1:{
          
        $arr[$i][$random]='B';
       
       break;
       }
       case 2:{
         
         $arr[$i][$random]='C';
         
       break;
       }
       case 3:{
        
        $arr[$i][$random]='D';
        
       break;
       }
      }
      
    }
    return array($arr,$a);
  }
  
  
  

}



?>

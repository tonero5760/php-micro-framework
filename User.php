<?php 

class User{
    public $userName;
    public $fname;
    public $lname;

    function __construct($userName,$fname,$lname){
        $this->userName = $userName;
        $this->fname = $fname;
        $this->lname = $lname;
    }

  
    public function fullDetail(){
        return $this->userName . ' '. $this->fname .' '. $this->lname;
    }
}

$toni = new User("Tonero",'Trex','Smith');



// print($toni->userName );
print($toni->fullDetail());
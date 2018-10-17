<?php
//plain old php object container
class User{
          private $name;
          private $pass;
          private $fullname;
          
          function __construct() {
              //$this->id=0;
              $this->name='';
              $this->pass='';
              $this->fullname='';
          }
          function getFullname() {
              return $this->fullname;
          }

          function setFullname($fullname) {
              $this->fullname = $fullname;
          }

                    
          function getName(){
              return $this->name;
          }
          function setName($name){
              $this->name =$name;
          }
          function getPass() {
              return $this->pass;
          }

          function setPass($pass) {
              $this->pass = $pass;
          }
//          function getId() {
//              return $this->id;
//          }
//
//          function setId($id) {
//              $this->id = $id;
//          } 
        }
?>
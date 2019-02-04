<?php

 public class User{

   private $name;
   private $username;
   private $sex;

   public function User(){};

   public function User($name,$username,$sex){
     $this->name = $name;
     $this->username = $username;
     $this->sex = $sex;
   }

   public function getName(){
     return $this->name;
   }
   public function getUsername(){
     return $this->username;
   }
   public function getSex(){
     return $this->sex;
   }


   public function setName($name){
     $this->name = $name;
   }
   public function setUsername($username){
     $this->username = $username;
   }
   public function setSex($sex){
     $this->sex = $sex;
   }


 }


?>

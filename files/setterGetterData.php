<?php 
    // ###### For Signup And Signin ######
    class setterGetterData{
        private $fullname;
        private $email;
        private $password;
      
        // Setter Data
        public function setName($fullname){
          $this->fullname = $fullname;
        }
      
        public function setEmail($email){
          $this->email = $email;
        }
      
        public function setPassword($password){
          $this->password = $password;
        }
      
        // Gettter Data
        public function getName(){
          return $this->fullname;
        }
      
        public function getEmail(){
          return $this->email;
        }
      
        public function getPassword(){
          return $this->password;
        }
    }

?>
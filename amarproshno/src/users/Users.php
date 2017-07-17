<?php

namespace App\users;
use App\utility\Utility;
use PDO;
session_start();


class Users
{
    private $email;
    private $password;
    private $cpassword;
    private $firstname;
    private $midname;
    private $lastname;
    private $dob;
    private $gender;
    private $hobby;
    private $interest;


    public function setUserData($data = '')
    {
       // Utility::debug($data);

        if(isset($data['email']) && !empty($data['email'])){
            $this->email = stripslashes($data['email']);
        }
        else{
            $_SESSION['email'] = "Email field is required";
            header('location: signup.php');
        }

        if(isset($data['password']) && !empty($data['password'])){
            $this->password = stripslashes($data['password']);
        }
        else{
            $_SESSION['password'] = "Password field is required";
            header('location: signup.php');
        }

        if(isset($data['cpassword']) && !empty($data['cpassword'])){
            $this->cpassword = stripslashes($data['cpassword']);
        }
        else{
            $_SESSION['cpassword'] = "Confirm Password field is required";
            header('location: signup.php');
        }


        return $this;
    }

    public function insertSignupData()
    {

        if(($this->password ) !== ($this->cpassword)){
            $_SESSION['cpassword'] = "Password and confirm password does not match.";
            header('location: signup.php');
        }
        else{
            try {
                $pdo = new PDO('mysql:host=localhost;dbname=amarproshno', 'root', '');
                $stmt = $pdo->prepare('INSERT INTO users(id, email, password, created_at) VALUES(:id, :email, :password, :created_at)');
                $status = $stmt->execute(
                    array(
                        ':id' => NULL,
                        ':email' => $this->email,
                        ':password' => $this->password,
                        ':created_at' => date('Y-m-d h:i:s')
                    )
                );

                if ($status) {
                    $_SESSION['userid'] = $status;
                    header("location: information.php");
                } else {
                    header("location: signup.php");
                }
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
    }

    public function matchLoginData($data = ''){

        if(isset($data['email']) && !empty($data['email'])){
            $this->email = "'" .$data['email']. "'";
        }
        else{
            $_SESSION['email'] = "Email field is required";
            header('location: login.php');
        }

        if(isset($data['password']) && !empty($data['password'])){
            $this->password = "'" .$data['password']. "'";
        }
        else{
            $_SESSION['password'] = "Password field is required";
            header('location: login.php');
        }



        $pdo = new PDO('mysql:host=localhost;dbname=amarproshno', 'root', '');
        $query = "SELECT * FROM users WHERE email =$this->email AND password = $this->password";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetch();
        if(!empty($data)){
            $_SESSION['userid'] = $data;
            header('location: index.php');
        }
        else{
            $_SESSION['message'] = "Please Enter Your Valid Username Or Password";
            header('location: login.php');
        }
    }

    public function setProfileData($data=''){

        if(isset($data['fname']) && !empty($data['fname'])){
            $this->firstname = $data['fname'];
        }
        else{
            $_SESSION['fname'] = "First name field is required";
            header('location: information.php');
        }


        if(isset($data['midname']) || empty($data['midname'])){
            $this->midname = $data['midname'];
        }


        if(isset($data['lname'])  && !empty($data['lname'])){
            $this->lastname = $data['lname'];
        }
        else{
            $_SESSION['lname'] = "Last name field is required";
            header('location: information.php');
        }


        if(isset($data['dob'])  && !empty($data['dob'])){
            $this->dob = $data['dob'];
        }
        else{
            $_SESSION['dob'] = "Date of birth field is required";
            header('location: information.php');
        }


        /*if(isset($data['photo']) || empty($data['photo'])){
            $this->photo = $data['photo'];
        }*/


        if(isset($data['gender'])  && !empty($data['gender'])){
            $this->gender = $data['gender'];
        }
        else{
            $_SESSION['gender'] = "Gender field is required";
            header('location: information.php');
        }


        if(isset($data['hobby'])  && !empty($data['hobby'])){
            $this->hobby = $data['hobby'];
        }
        else{
            $_SESSION['hobby'] = "Hobby field is required";
            header('location: information.php');
        }


        if(isset($data['interest'])  && !empty($data['interest'])){
            $this->interest = $data['interest'];
        }
        else{
            $_SESSION['interest'] = "Interest field is required";
            header('location: information.php');
        }

        return $this;
    }

    public function storeProfileData(){
       $photo = $this->uploadImage();

       if(isset($photo) || empty($photo)) {
           try {
               $pdo = new PDO('mysql:host=localhost;dbname=amarproshno', 'root', '');
               $stmt = $pdo->prepare('INSERT INTO profile(id, u_id, fname, midname, lname, dob, gender, photo, hobby, interest, created_at) 
                                      VALUES(:id, :uid, :fname,:midname, :lname, :dob, :gender, :photo, :hobby, :interest, :created_at)');
               $status = $stmt->execute(
                   array(
                       ':id' => NULL,
                       ':uid' => $_SESSION['userid']['id'],
                       ':fname' => ucfirst($this->firstname),
                       ':midname' =>  ucfirst($this->midname),
                       ':lname' =>  ucfirst($this->lastname),
                       ':dob' => $this->dob,
                       ':photo' => $photo,
                       ':gender' => $this->gender,
                       ':hobby' => ucfirst($this->hobby),
                       ':interest' => implode(',', $this->interest),
                       ':created_at' => date('Y-m-d h:i:s')
                   )
               );

               if ($status) {
                   header("location: message.php");
               } else {

                   $_SESSION['message'] = "Oops ! Database Connection Error.";
                   header("location: information.php");
               }
           } catch (PDOException $e) {
               echo 'Error: ' . $e->getMessage();
           }
       }
    }

    private function uploadImage(){
        //$this->photo = $data['photo'];
        $type = explode('.', $_FILES['photo']['name']);
        $type = $type[count($type)-1];
        $url = "../../assests/img/".uniqid(rand()). "." .$type;

        if(in_array($type, array('jpg', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG'))){
            if(is_uploaded_file($_FILES['photo']['tmp_name'])){
                if(move_uploaded_file($_FILES['photo']['tmp_name'], $url)){
                    return $url;
                }
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }

    public function getProfileData(){
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=amarproshno', 'root', '');
            $query = 'SELECT users.email, users.id, profile.u_id, profile.fname, profile.midname, profile.lname, profile.dob,
                      profile.photo, profile.gender, profile.hobby, profile.interest FROM users INNER JOIN profile 
                      ON profile.u_id=users.id where profile.u_id ='. $_SESSION['userid']['id'];
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $data = $stmt->fetchAll();
            $_SESSION['profile'] = $data;
            return $data;

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();

        }
    }

}
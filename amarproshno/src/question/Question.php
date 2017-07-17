<?php

namespace App\question;
use App\utility\Utility;
use PDO;

session_start();

class Question
{
    // private $userId;
    private $title;
    private $question;

    public function setData($data='')
    {
        //$this->userId=
        $this->title=$data['qtitle'];
        $this->question=$data['question'];
        return $this;
    }

    public function storeQuestion()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=amarproshno', 'root', '');

            $query = 'INSERT INTO question(id, u_id, title, description, created_at) VALUES(:id, :uid, :tt, :ds, :created_at)';
            $stmt = $pdo->prepare($query);
            $status=$stmt->execute(
                array(
                    ':id'  => null,
                    ':uid' => $_SESSION['userid']['id'],
                    ':tt'  => ucfirst($this->title),
                    ':ds'  =>$this->question,
                   ':created_at' => date('Y-m-d h:i:s')
                )

            );
            if($status){
                //$_SESSION['message'] = "<h2>Successfully Created The Quesion</h2>";
                header("location: allQuestion.php");
            }
            else{
                $_SESSION['message'] = "<h2>Oops! Database Connection Error.</h2>";
                header("location: createQuestion.php");
            }

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();

        }

    }

    public function showAllQuestion()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=amarproshno', 'root', '');
            $query = "SELECT users.id, profile.u_id, profile.fname, profile.midname, profile.lname,profile.photo,profile.interest, question.id,question.u_id,  
                      question.title,question.description FROM ((users INNER JOIN question ON question.u_id=users.id)INNER JOIN profile ON profile.u_id=users.id)";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $data = $stmt->fetchAll();
            return $data;

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();

        }
    }

    public function showUserQuestion(){
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=amarproshno', 'root', '');
            //$query = 'SELECT * FROM question WHERE u_id = '.$_SESSION['userid']['id'];
            $query = "SELECT profile.u_id, profile.fname, profile.midname, profile.lname,profile.photo, 
                             profile.interest, question.id, question.u_id, question.title, question.description 
                            FROM question INNER JOIN profile ON profile.u_id=question.u_id WHERE question.u_id = ". $_SESSION['userid']['id'];
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $data = $stmt->fetchAll();
            return $data;

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();

        }
    }


}
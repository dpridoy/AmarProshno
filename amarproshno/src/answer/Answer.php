<?php

namespace App\answer;
use App\utility\Utility;
use PDO;
session_start();


class Answer
{
    private $answer;
    private $qid;


    public function setData($data='')
    {
        $this->answer =$data['answer'];
        $this->qid = $data['qid'];
        return $this;
    }

    public function getQuestion($id = ''){

        try {
            $pdo = new PDO('mysql:host=localhost;dbname=amarproshno', 'root', '');
            //$query = "SELECT * FROM question WHERE id = $id";
            $query = "SELECT profile.u_id, profile.fname, profile.midname, profile.lname,profile.photo, 
                             profile.interest, question.id, question.u_id, question.title, question.description 
                            FROM question INNER JOIN profile ON profile.u_id=question.u_id WHERE question.id = $id";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $data = $stmt->fetch();
            return $data;

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();

        }
    }

    public function storeAnswer()
    {

        try {
            $pdo = new PDO('mysql:host=localhost;dbname=amarproshno', 'root', '');
            $stmt = $pdo->prepare('INSERT INTO answer (id, u_id, q_id, answers, created_at) VALUES (:id, :uid, :qid, :ans, :created_at)');
            $status=$stmt->execute(
                array(
                    ':id' => null,
                    ':uid' => $_SESSION["userid"]["id"],
                    ':qid' => $this->qid,
                    ':ans'=>$this->answer,
                    ':created_at' => date('Y-m-d h:i:s')
                )
            );

            if($status){
                header("location: answer.php?id=$this->qid");
            }
            else{
                $_SESSION['message'] = "<h2>Oops! Database Connection Error.</h2>";
                header("location: answer.php");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();

        }
    }

    public function showAllAnswer($qid = '')
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=amarproshno', 'root', '');
            $query = "SELECT profile.u_id, profile.fname, profile.midname, profile.lname,profile.photo,profile.interest, 
                             question.id, answer.q_id, answer.answers 
                            FROM ((answer INNER JOIN profile ON profile.u_id=answer.u_id) INNER JOIN question ON answer.q_id=question.id ) WHERE answer.q_id = $qid";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $data = $stmt->fetchAll();
            return $data;

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();

        }
    }



    public function showUserAnswer()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=amarproshno', 'root', '');
            $query = "SELECT profile.u_id, profile.fname, profile.midname, profile.lname,profile.photo,profile.interest, 
                             question.id, question.title, question.description, answer.u_id, answer.q_id, answer.answers
                            FROM (( question INNER JOIN profile ON profile.u_id=question.u_id) 
                            INNER JOIN answer ON answer.q_id=question.id ) WHERE answer.u_id =".$_SESSION['userid']['id'];
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $data = $stmt->fetchAll();
            return $data;

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();

        }
    }

}
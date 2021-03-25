<?php
class Quizz
{

    // database connection and table name
    private $conn;
    private $table_name = "quizz";

    // object properties
    public $id;
    public $topic_id;
    public $question;
    public $ansA;
    public $ansB;
    public $ansC;
    public $ansD;
    public $correct;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // read quizzs
    function read()
    {

        // select all query
        $query = "SELECT * FROM " . $this->table_name;

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // read quizzs
    function readByTopic()
    {

        // select all query
        $query = "SELECT * FROM " . $this->table_name . " WHERE topic_id = ?";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of quizz to be updated
        $stmt->bindParam(1, $this->topic_id);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // read random quizz
    function randomByTopic()
    {

        // select all query
        $query = "SELECT * FROM " . $this->table_name . " WHERE topic_id = ? ORDER BY RAND() LIMIT 0,10;";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of quizz to be updated
        $stmt->bindParam(1, $this->topic_id);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // create quizz
    function create()
    {

        // query to insert record
        $query = "INSERT INTO " . $this->table_name .
            "(topic_id, 
            question, 
            ansA, 
            ansB, 
            ansC, 
            ansD, 
            correct) VALUES (:topic_id, 
            :question, 
            :ansA, 
            :ansB, 
            :ansC, 
            :ansD, 
            :correct)";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->topic_id = htmlspecialchars(strip_tags($this->topic_id));
        $this->question = htmlspecialchars(strip_tags($this->question));
        $this->ansA = htmlspecialchars(strip_tags($this->ansA));
        $this->ansB = htmlspecialchars(strip_tags($this->ansB));
        $this->ansC = htmlspecialchars(strip_tags($this->ansC));
        $this->ansD = htmlspecialchars(strip_tags($this->ansD));
        $this->correct = htmlspecialchars(strip_tags($this->correct));

        // bind values
        $stmt->bindParam(":topic_id", $this->topic_id);
        $stmt->bindParam(":question", $this->question);
        $stmt->bindParam(":ansA", $this->ansA);
        $stmt->bindParam(":ansB", $this->ansB);
        $stmt->bindParam(":ansC", $this->ansC);
        $stmt->bindParam(":ansD", $this->ansD);
        $stmt->bindParam(":correct", $this->correct);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // used when filling up the update quizz form
    function readOne()
    {

        // query to read single record
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of quizz to be updated
        $stmt->bindParam(1, $this->id);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->id = $row['id'] ?? null;
        $this->topic_id = $row["topic_id"] ?? null;
        $this->question = $row["question"] ?? null;
        $this->ansA = $row["ansA"] ?? null;
        $this->ansB = $row["ansB"] ?? null;
        $this->ansC = $row["ansC"] ?? null;
        $this->ansD = $row["ansD"] ?? null;
        $this->correct = $row["correct"] ?? null;
    }

    // update the quizz
    function update()
    {

        // update query
        $query = "UPDATE
                " . $this->table_name . "
            SET
                topic_id=:topic_id, 
                question=:question, 
                ansA=:ansA, 
                ansB=:ansB, 
                ansC=:ansC, 
                ansD=:ansD, 
                correct=:correct
            WHERE
                id = :id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->topic_id = htmlspecialchars(strip_tags($this->topic_id));
        $this->question = htmlspecialchars(strip_tags($this->question));
        $this->ansA = htmlspecialchars(strip_tags($this->ansA));
        $this->ansB = htmlspecialchars(strip_tags($this->ansB));
        $this->ansC = htmlspecialchars(strip_tags($this->ansC));
        $this->ansD = htmlspecialchars(strip_tags($this->ansD));
        $this->correct = htmlspecialchars(strip_tags($this->correct));

        // bind values
        $stmt->bindParam(":topic_id", $this->topic_id);
        $stmt->bindParam(":question", $this->question);
        $stmt->bindParam(":ansA", $this->ansA);
        $stmt->bindParam(":ansB", $this->ansB);
        $stmt->bindParam(":ansC", $this->ansC);
        $stmt->bindParam(":ansD", $this->ansD);
        $stmt->bindParam(
            ":correct",
            $this->correct
        );

        // execute the query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // delete the quizz
    function delete()
    {

        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}

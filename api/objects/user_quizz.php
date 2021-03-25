<?php
class UserQuizz
{

    // database connection and table name
    private $conn;
    private $table_name = "user_quizzs";

    // object properties
    public $id;
    public $user_id;
    public $topic_id;
    public $start_at;
    public $finish_at;
    public $score;
    public $quizz_data;
    public $name;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // read user quizzs
    function read()
    {

        // select all query
        $query = "SELECT uq.id, uq.start_at, uq.finish_at, uq.score,t.name FROM user_quizzs as uq JOIN topic as t ON uq.topic_id = t.id WHERE uq.user_id = ?";
        if (isset($this->topic_id))
            $query = $query . "AND uq.topic_id= ?";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of quizz to be updated
        $stmt->bindParam(1, $this->user_id);
        if (isset($this->topic_id))
            $stmt->bindParam(2, $this->topic_id);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // create user quizz
    function create()
    {

        // query to insert record
        $query = "INSERT INTO " . $this->table_name .
            "(user_id, 
            topic_id, 
            start_at, 
            finish_at, 
            score, 
            quizz_data) VALUES (
            :user_id, 
            :topic_id, 
            :start_at, 
            :finish_at, 
            :score, 
            :quizz_data)";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $this->topic_id = htmlspecialchars(strip_tags($this->topic_id));
        // $this->start_at = $this->start_at;
        // $this->finish_at = $this->finish_at;
        // $this->score = htmlspecialchars(strip_tags($this->score));
        // $this->quizz_data = $this->quizz_data;

        // bind values
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":topic_id", $this->topic_id);
        $stmt->bindParam(":start_at", $this->start_at);
        $stmt->bindParam(":finish_at", $this->finish_at);
        $stmt->bindParam(":score", $this->score);
        $stmt->bindParam(":quizz_data", $this->quizz_data);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    function countAllForUser()
    {
        // query to read single record
        $query = "SELECT COUNT(*) as count FROM " . $this->table_name . " WHERE user_id = ?";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of quizz to be updated
        $stmt->bindParam(1, $this->user_id);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        return $row['count'] ?? 0;
    }

    function getMaxScore()
    {
        // query to read single record
        $query = "SELECT MAX(score) as max_score FROM " . $this->table_name . " WHERE user_id = ? AND topic_id = ?";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of quizz to be updated
        $stmt->bindParam(1, $this->user_id);
        $stmt->bindParam(2, $this->topic_id);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        return $row['max_score'] ?? 0;
    }

    function countForUserAndTopic()
    {
        // query to read single record
        $query = "SELECT COUNT(*) as count FROM " . $this->table_name . " WHERE user_id = ? AND topic_id = ?";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of quizz to be updated
        $stmt->bindParam(1, $this->user_id);
        $stmt->bindParam(2, $this->topic_id);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        return $row['count'] ?? 0;
    }

    // used when filling up the update user quizz form
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
        $this->user_id = $row['user_id'] ?? null;
        $this->topic_id = $row["topic_id"] ?? null;
        $this->start_at = $row["start_at"] ?? null;
        $this->finish_at = $row["finish_at"] ?? null;
        $this->score = $row["score"] ?? null;
        $this->quizz_data = $row["quizz_data"] ?? null;
    }

    // update the user quizz
    function update()
    {

        // update query
        $query = "UPDATE
                " . $this->table_name . "
            SET
                user_id=:user_id, 
                topic_id=:topic_id, 
                start_at=:start_at, 
                finish_at=:finish_at, 
                score=:score, 
                quizz_data=:quizz_data
            WHERE
                id = :id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $this->topic_id = htmlspecialchars(strip_tags($this->topic_id));
        $this->start_at = htmlspecialchars(strip_tags($this->start_at));
        $this->finish_at = htmlspecialchars(strip_tags($this->finish_at));
        $this->score = htmlspecialchars(strip_tags($this->score));
        $this->quizz_data = htmlspecialchars(strip_tags($this->quizz_data));

        // bind values
        $stmt->bindParam(
            ":user_id",
            $this->user_id
        );
        $stmt->bindParam(":topic_id", $this->topic_id);
        $stmt->bindParam(":start_at", $this->start_at);
        $stmt->bindParam(":finish_at", $this->finish_at);
        $stmt->bindParam(":score", $this->score);
        $stmt->bindParam(":quizz_data", $this->quizz_data);

        // execute the query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // delete the user quizz
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

<?php
class Topic
{

    // database connection and table name
    private $conn;
    private $table_name = "topic";

    // object properties
    public $id;
    public $icon;
    public $name;
    public $description;
    public $count;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // read topics
    function read()
    {

        // select all query
        $query = "SELECT t.*, COUNT(q.id) as count FROM " . $this->table_name . " as t LEFT JOIN quizz as q ON t.id = q.topic_id GROUP BY t.id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    function rankingAll()
    {

        // select all query
        $query = "SELECT u.*, count(uq.id) as times , avg(uq.score) avg_score " .
            "FROM user_quizzs uq JOIN user u ON uq.user_id = u.id " .
            "GROUP BY id " .
            "ORDER BY avg_score desc, times desc ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    function rankingByTopic()
    {

        // select all query
        $query = "SELECT u.*, count(uq.id) as times , avg(uq.score) as avg_score FROM user_quizzs uq JOIN user u ON uq.user_id = u.id WHERE uq.topic_id=? GROUP BY id ORDER BY avg_score desc, times desc";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of topic to be updated
        $stmt->bindParam(1, $this->id);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // create topic
    function create()
    {

        // query to insert record
        $query = "INSERT INTO " . $this->table_name . "(icon, name, description) VALUES (:icon, :name, :description)";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->icon = htmlspecialchars(strip_tags($this->icon));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->description = htmlspecialchars(strip_tags($this->description));

        // bind values
        $stmt->bindParam(
            ":icon",
            $this->icon
        );
        $stmt->bindParam(
            ":name",
            $this->name
        );
        $stmt->bindParam(":description", $this->description);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // used when filling up the update topic form
    function readOne()
    {

        // query to read single record
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of topic to be updated
        $stmt->bindParam(1, $this->id);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->id = $row['id'] ?? null;
        $this->icon = $row['icon'] ?? null;
        $this->name = $row['name'] ?? null;
        $this->description = $row['description'] ?? null;
    }

    // update the topic
    function update()
    {

        // update query
        $query = "UPDATE
                " . $this->table_name . "
            SET
                name = :name,
                icon = :icon,
                description = :description
            WHERE
                id = :id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind new values
        $stmt->bindParam(':icon', $this->icon);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':id', $this->id);

        // execute the query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // delete the topic
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

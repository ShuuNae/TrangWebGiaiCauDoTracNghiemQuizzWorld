<?php
class User
{

    // database connection and table name
    private $conn;
    private $table_name = "user";

    // object properties
    public $id;
    public $username;
    public $password;
    public $fullname;
    public $gender;
    public $email;
    public $role;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // read user
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

    // create user
    function create()
    {

        // query to insert record
        $query = "INSERT INTO " . $this->table_name .
            "(username,password,fullname,gender,email,role) VALUES (:username,:password,:fullname,:gender,:email,:role)";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->fullname = htmlspecialchars(strip_tags($this->fullname));
        $this->gender = htmlspecialchars(strip_tags($this->gender));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->role = htmlspecialchars(strip_tags($this->role));

        // bind values
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":fullname", $this->fullname);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":role", $this->role);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    function checkExists()
    {
        // query to read single record
        $query = "SELECT COUNT(*) as same_records FROM " . $this->table_name .
            " WHERE username = ? LIMIT 0,1";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of quizz to be updated
        $stmt->bindParam(1, $this->username);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // have other?
        return ($row['same_records'] ?? 0) > 0;
    }

    // used when filling up the update user form
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
        $this->username = $row["username"] ?? null;
        $this->password = $row["password"] ?? null;
        $this->fullname = $row["fullname"] ?? null;
        $this->gender = $row["gender"] ?? null;
        $this->email = $row["email"] ?? null;
        $this->role = $row["role"] ?? null;
    }

    // used when user login
    function login()
    {

        // query to read single record
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = ? AND password = ? LIMIT 0,1";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of quizz to be updated
        $stmt->bindParam(1, $this->username);
        $stmt->bindParam(2, $this->password);

        // execute query
        $res = $stmt->execute();

        if ($res) {
            // get retrieved row
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // set values to object properties
            $this->id = $row['id'] ?? null;
            $this->username = $row['username'] ?? null;
            $this->password = $row["password"] ?? null;
            $this->fullname = $row["fullname"] ?? null;
            $this->gender = $row["gender"] ?? null;
            $this->email = $row["email"] ?? null;
            $this->role = $row["role"] ?? null;
            return true;
        } else {
            return false;
        }
    }

    // update the user
    function update()
    {

        // update query
        $query = "UPDATE
                " . $this->table_name . "
            SET
                username=:username, 
                password=:password, 
                fullname=:fullname, 
                gender=:gender, 
                email=:email, 
                role=:role
            WHERE
                id = :id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->fullname = htmlspecialchars(strip_tags($this->fullname));
        $this->gender = htmlspecialchars(strip_tags($this->gender));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->role = htmlspecialchars(strip_tags($this->role));

        // bind values
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":fullname", $this->fullname);
        $stmt->bindParam(
            ":gender",
            $this->gender
        );
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":role", $this->role);
        $stmt->bindParam(":id", $this->id);

        // execute the query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // delete the user
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

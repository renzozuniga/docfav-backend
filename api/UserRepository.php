<?php

namespace Api;

use Exception;

class UserRepository
{
    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create(array $input)
    {
        try {
            $surname = $input['surname'];
            $firstName = $input['firstName'];
            $email = $input['email'];
            $pass = $input['pass'];

            $this->db->query("insert into users(surname, firstName, email, pass) values('$surname', '$firstName', '$email', '$pass')");
            $this->db->close();
            return 'creation successful';
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            die($errorMessage);
        }
    }

    public function findAll()
    {
        try {
            $result = $this->db->query("select * from users");
            $result = $result->fetch_all(MYSQLI_ASSOC);
            $this->db->close();
            return $result;
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            die($errorMessage);
        }
    }

    public function update($userId, array $input)
    {
        try {
            $surname = $input['surname'];
            $firstName = $input['firstName'];
            $email = $input['email'];
            $pass = $input['pass'];

            $this->db->query("update users set surname = '$surname', firstName = '$firstName', email = '$email', pass = '$pass' where id = '$userId' ");
            $this->db->close();
            return "update successful";
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            die($errorMessage);
        }
    }

    public function delete($userId)
    {
        try {
            $this->db->query("delete from users where id = '$userId' ");
            return "delete successful";
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            die($errorMessage);
        }
    }
} // end class
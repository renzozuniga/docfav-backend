<?php

namespace Api;

use Exception;

class AlternativeUserRepository
{

    private $db;
    private $index;

    public function __construct()
    {
        $this->db = [];
        $this->index = 0;
    }

    public function create(array $input)
    {
        try {
            if (count($input) === 0) {
                throw new Exception('empty input');
            }

            $this->index += 1;
            $key = strval($this->index);

            $surname = $input['surname'];
            $firstName = $input['firstName'];
            $email = $input['email'];
            $pass = $input['pass'];

            $userData = [
                'surname' => $surname,
                'firstName' => $firstName,
                'email' => $email,
                'pass' => $pass
            ];

            $this->db[$key] = $userData;
            return $this->index;
            return 'creation successful';
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            return $errorMessage;
        }
    }

    public function findAll()
    {
        try {
            return $this->db;
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

            $userData = [
                'surname' => $surname,
                'firstName' => $firstName,
                'email' => $email,
                'pass' => $pass
            ];

            $key = strval($userId);
            $db[$key] = $userData;

            return "update successful";
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            die($errorMessage);
        }
    }

    public function delete($userId)
    {
        try {
            $key = strval($userId);
            unset($this->db[$key]);

            return "delete successful";
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            die($errorMessage);
        }
    }
} // end class
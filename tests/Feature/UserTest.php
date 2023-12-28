<?php

require_once(__DIR__.'../../../vendor/autoload.php');

use Api\UserController;

use PHPUnit\Framework\TestCase;

final class UserTest extends TestCase{

    /**
     * @test for create new user
     */
    public function should_create_new_user(){
        $user = $this->userData();
        
        $userController = new UserController('', '', 'POST');
        $response = $userController->createUser($user);
        $this->assertEquals($response['status_code_header'] , 'HTTP/1.1 201 Created');
        

    }
    /**
     * @test for create new user without body
     */
    public function should_not_create_new_user_with_empty_input(){
        
        $userController = new UserController('', '', 'POST');
        $response = $userController->createUser([]);
        $decoded_response = json_decode($response['body']);
        $this->assertEquals($decoded_response->message, 'empty input');
        
    }

    /**
     * @test for get all users
     */
    public function should_get_all_users(){
        $userController = new UserController('', '', 'GET');
        $response = $userController->getUsers();
        $this->assertEquals($response['status_code_header'] , 'HTTP/1.1 200 OK');
    }

    /**
     * @test for update user
     */
    public function should_update_user(){
        $user = $this->userData();

        $userController = new UserController(1, '', 'PATCH');
        $response = $userController->updateUser(1, $user);
        $this->assertEquals($response['status_code_header'] , 'HTTP/1.1 200 OK');
    }

    /**
     * @test for delete user
     */
    public function should_delete_user(){
        $userController = new UserController(1, '', 'DELETE');
        $response = $userController->deleteUser(1);
        $this->assertEquals($response['status_code_header'] , 'HTTP/1.1 200 OK');
    }
   
    private function userData(){
        return [
            'surname' => 'smith',
            'firstName' => 'john',
            'email' => 'john@example.com',
            'pass' => 'test'
        ];

    }
}
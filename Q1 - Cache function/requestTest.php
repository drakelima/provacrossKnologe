<?php

use PHPUnit\Framework\TestCase;

include('request.php');
include('config/redis.php');

class requesTest extends TestCase{

    const URL_BASE = 'https://jsonplaceholder.typicode.com';
    const DADOGET = self::URL_BASE . '/comments';
    const DADOPOST = self::URL_BASE . '/posts';

    public function testGet(){
        $dado = SimpleJsonRequest::get(self::DADOGET);
        self::assertNotEmpty($dado); 
    }
    
    public function testPost(){
        $body = [
            'title' => 'igorDaniel',
            'body' => 'lorem ipsum dolor',
            'userId' => '1'
        ];
        $dado = SimpleJsonRequest::post(self::DADOPOST, null, $body);
        self::assertNotEmpty($dado);
    }

    public function testPut(){
        $body = [
            'id' => '1',
            'name' => 'Joyce queiroz',
            'email' => 'joyce@test.com',
            'body' => 'lorem impsum impsum',
            'userId' => 1
        ];
        $dado = SimpleJsonRequest::put(self::DADOPOST . '/' .$body['id'], null, $body);
        self::assertNotEmpty($dado);
    }

    public function testPatch(){
        $id = 1;
        $body = [
            'body' => 'lorem impsum impsum'
        ];

        $dado = SimpleJsonRequest::patch(self::DADOPOST . '/' .$id, null, $body);
        self::assertNotEmpty($dado);
    }

    public function testDelete(){
        $id = 1;
        $dado = SimpleJsonRequest::patch(self::DADOPOST . '/' .$id, null, []);
        self::assertNotEmpty($dado);
    }
}
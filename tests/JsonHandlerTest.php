<?php

use PHPUnit\Framework\TestCase;
use VishalShakya\JsonHandler;

class JsonHandlerTest extends TestCase
{
    public function testEncodeWithArray()
    {
        $data = ['name' => 'John', 'age' => 30];
        $expected = '{"name":"John","age":30}';
        $this->assertEquals($expected, JsonHandler::encode($data));
    }

    public function testEncodeWithObject()
    {
        $data = new stdClass();
        $data->name = 'John';
        $data->age = 30;
        $expected = '{"name":"John","age":30}';
        $this->assertEquals($expected, JsonHandler::encode($data));
    }

    public function testEncodeWithInvalidDataType()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid data type. Only arrays and objects can be encoded to JSON.');
        JsonHandler::encode('invalid data');
    }

    public function testDecodeWithValidJsonString()
    {
        $jsonString = '{"name":"John","age":30}';
        $expected = (object) ['name' => 'John', 'age' => 30];
        $this->assertEquals($expected, JsonHandler::decode($jsonString));
    }

    public function testDecodeWithValidJsonStringAndAssociativeTrue()
    {
        $jsonString = '{"name":"John","age":30}';
        $expected = ['name' => 'John', 'age' => 30];
        $this->assertEquals($expected, JsonHandler::decode($jsonString, true));
    }

    public function testDecodeWithInvalidJsonString()
    {
        $this->expectException(\JsonException::class);
        $this->expectExceptionMessage('Syntax error');
        JsonHandler::decode('invalid json string');
    }

    public function testDecodeWithInvalidJsonStringAndAssociativeTrue()
    {
        $this->expectException(\JsonException::class);
        $this->expectExceptionMessage('Syntax error');
        JsonHandler::decode('invalid json string', true);
    }

    public function testDecodeWithNonAssociativeArray()
    {
        $jsonString = '[1,2,3]';
        $expected = [1, 2, 3];
        $this->assertEquals($expected, JsonHandler::decode($jsonString, true));
    }
}

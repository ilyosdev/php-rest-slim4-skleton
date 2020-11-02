<?php

declare(strict_types=1);

namespace Tests\integration;

class NotesTest extends TestCase
{
    private static $id;

    public function testCreate()
    {
        $params = [
            '' => '',
            'name' => 'aaa',
        ];
        $req = $this->createRequest('POST', '/notes');
        $request = $req->withParsedBody($params);
        $response = $this->getAppInstance()->handle($request);

        $result = (string) $response->getBody();

        self::$id = json_decode($result)->id;

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertStringContainsString('id', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    public function testGetAll()
    {
        $request = $this->createRequest('GET', '/notes');
        $response = $this->getAppInstance()->handle($request);

        $result = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('id', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    public function testGetOne()
    {
        $request = $this->createRequest('GET', '/notes/' . self::$id);
        $response = $this->getAppInstance()->handle($request);

        $result = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('id', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    public function testGetOneNotFound()
    {
        $request = $this->createRequest('GET', '/notes/123456789');
        $response = $this->getAppInstance()->handle($request);

        $result = (string) $response->getBody();

        $this->assertEquals(404, $response->getStatusCode());
        $this->assertStringContainsString('error', $result);
    }

    public function testUpdate()
    {
        $req = $this->createRequest('PUT', '/notes/' . self::$id);
        $request = $req->withParsedBody(['' => '']);
        $response = $this->getAppInstance()->handle($request);

        $result = (string) $response->getBody();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('id', $result);
        $this->assertStringNotContainsString('error', $result);
    }

    public function testDelete()
    {
        $request = $this->createRequest('DELETE', '/notes/' . self::$id);
        $response = $this->getAppInstance()->handle($request);

        $result = (string) $response->getBody();

        $this->assertEquals(204, $response->getStatusCode());
        $this->assertStringNotContainsString('error', $result);
    }
}

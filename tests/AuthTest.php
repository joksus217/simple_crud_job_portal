<?php
declare(strict_types=1); 

use PHPUnit\Framework\TestCase;

final class AuthTest extends TestCase
{
    private $http;

    public function setUp() {
        include 'config.php';
        $this->http = new GuzzleHttp\Client(['base_uri' => $base_uri, 'http_errors' => false]);
    }

    public function tearDown() {
        $this->http = null;
    }

    public function testSuccess()
    {
        $response = $this->http->request('POST', 'auth', [
                                    'headers' => [
                                                    'Authorization' => 'Basic ' . base64_encode('john_doe:secret')
                                                ]
                            ]);

        $this->assertEquals(200, $response->getStatusCode());

        $contentType = $response->getHeaders()["Content-Type"][0];

        $this->assertEquals("application/json", $contentType);

        $body = json_decode($response->getBody()->getContents(), true);

        $this->assertArrayHasKey('access_token', $body);
        $this->assertArrayHasKey('expired_in', $body);
    }

    public function testFail400()
    {
        $response = $this->http->request('POST', 'auth');

        $this->assertEquals(400, $response->getStatusCode());

        $contentType = $response->getHeaders()["Content-Type"][0];

        $this->assertEquals("application/json", $contentType);

        $body = json_decode($response->getBody()->getContents(), true);

        $this->assertArrayHasKey('error', $body);
    }

    public function testFail401()
    {
        $response = $this->http->request('POST', 'auth', [
                                    'headers' => [
                                                    'Authorization' => 'Basic ' . base64_encode('admin:13')
                                                ]
                            ]);

        $this->assertEquals(401, $response->getStatusCode());

        $contentType = $response->getHeaders()["Content-Type"][0];

        $this->assertEquals("application/json", $contentType);

        $body = json_decode($response->getBody()->getContents(), true);

        $this->assertArrayHasKey('error', $body);
    }
}

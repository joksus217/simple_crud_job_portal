<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class CreateProposalTest extends TestCase
{
	private $http;

    public function setUp()
    {
        include 'config.php';
        $this->http = new GuzzleHttp\Client(['base_uri' => $base_uri, 'http_errors' => false]);
    }

    public function tearDown()
    {
        $this->http = null;
    }

    public function loginFreelancer()
    {
    	$response = $this->http->request('POST', 'auth', [
                                    'headers' => [
                                                    'Authorization' => 'Basic ' . base64_encode('john_doe:secret')
                                                ]
                            ]);

        $this->assertEquals(200, $response->getStatusCode());

        $contentType = $response->getHeaders()['Content-Type'][0];

        $this->assertEquals('application/json', $contentType);

        $body = json_decode($response->getBody()->getContents());

        return $body->access_token;

    }

    public function loginCompany()
    {
        $response = $this->http->request('POST', 'auth', [
                                    'headers' => [
                                                    'Authorization' => 'Basic ' . base64_encode('ben_brode:secret')
                                                ]
                            ]);

        $this->assertEquals(200, $response->getStatusCode());

        $contentType = $response->getHeaders()['Content-Type'][0];

        $this->assertEquals('application/json', $contentType);

        $body = json_decode($response->getBody()->getContents());

        return $body->access_token;

    }

    public function testSuccess()
    {
    	$response = $this->http->request('POST', 'job/1/proposal', [
                                    'headers' => [
                                        'Authorization' => 'Bearer ' . $this->loginFreelancer(),
                                        'Content-Type' => 'application/json'
                                    ],
                                    'json' => [
                                    	'budget' => 50,
                                        'estimation_date' => 100,
                                        'summary' => 'Lorem ipsum'
                                    ]
                            ]);
    	
    	$this->assertEquals(201, $response->getStatusCode());
    	$contentType = $response->getHeaders()["Content-Type"][0];

    	$this->assertEquals('application/json', $contentType);
        $body = json_decode($response->getBody()->getContents(), true);
        
        $this->assertArrayHasKey('id', $body);

        // resubmit
        $response = $this->http->request('POST', 'job/1/proposal', [
                                    'headers' => [
                                        'Authorization' => 'Bearer ' . $this->loginFreelancer(),
                                        'Content-Type' => 'application/json'
                                    ],
                                    'json' => [
                                        'budget' => 50,
                                        'estimation_date' => 100,
                                        'summary' => 'Lorem ipsum'
                                    ]
                            ]);
        
        $this->assertEquals(401, $response->getStatusCode());
        $contentType = $response->getHeaders()["Content-Type"][0];

        $this->assertEquals('application/json', $contentType);
        $body = json_decode($response->getBody()->getContents(), true);
        
        $this->assertArrayHasKey('error', $body);

        // get proposal
        $response = $this->http->request('GET', 'job/1/proposal', [
                                    'headers' => [
                                        'Authorization' => 'Bearer ' . $this->loginCompany(),
                                        'Content-Type' => 'application/json'
                                    ],
                                    'json' => [
                                        'budget' => 50,
                                        'estimation_date' => 100,
                                        'summary' => 'Lorem ipsum'
                                    ]
                            ]);
        
        $this->assertEquals(200, $response->getStatusCode());
        $contentType = $response->getHeaders()["Content-Type"][0];

        $this->assertEquals('application/json', $contentType);
        $body = json_decode($response->getBody()->getContents(), true);
        
        $this->assertArrayHasKey('data', $body);
        $this->assertArrayHasKey('freelancer', $body['data'][0]);
        $this->assertArrayHasKey('position', $body['data'][0]);
        $this->assertArrayHasKey('experience', $body['data'][0]);
        $this->assertArrayHasKey('budget', $body['data'][0]);
        $this->assertArrayHasKey('estimation_date', $body['data'][0]);
        $this->assertArrayHasKey('summary', $body['data'][0]);
    }

    public function testCreate404()
    {
        $response = $this->http->request('POST', 'job/2/proposal', [
                                    'headers' => [
                                        'Authorization' => 'Bearer ' . $this->loginFreelancer(),
                                        'Content-Type' => 'application/json'
                                    ],
                                    'json' => [
                                        'budget' => 50,
                                        'estimation_date' => 100,
                                        'summary' => 'Lorem ipsum'
                                    ]
                            ]);
        
        $this->assertEquals(404, $response->getStatusCode());
        $contentType = $response->getHeaders()["Content-Type"][0];

        $this->assertEquals('application/json', $contentType);
        $body = json_decode($response->getBody()->getContents(), true);
        
        $this->assertArrayHasKey('error', $body);
    }

    public function test404()
    {
        $response = $this->http->request('GET', 'job/100/proposal', [
                                    'headers' => [
                                        'Authorization' => 'Bearer ' . $this->loginCompany(),
                                        'Content-Type' => 'application/json'
                                    ],
                                    'json' => [
                                        'budget' => 50,
                                        'estimation_date' => 100,
                                        'summary' => 'Lorem ipsum'
                                    ]
                            ]);
        
        $this->assertEquals(404, $response->getStatusCode());
        $contentType = $response->getHeaders()["Content-Type"][0];

        $this->assertEquals('application/json', $contentType);
        $body = json_decode($response->getBody()->getContents(), true);
        
        $this->assertArrayHasKey('error', $body);
    }

    public function test400()
    {
        $response = $this->http->request('POST', 'job/60/proposal', [
                                    'headers' => [
                                        'Authorization' => 'Bearer ' . $this->loginFreelancer(),
                                        'Content-Type' => 'application/json'
                                    ],
                                    'json' => [
                                    ]
                            ]);
        
        $this->assertEquals(400, $response->getStatusCode());
        $contentType = $response->getHeaders()["Content-Type"][0];

        $this->assertEquals('application/json', $contentType);
        $body = json_decode($response->getBody()->getContents(), true);
        
        $this->assertArrayHasKey('error', $body);
    }

    public function testRank()
    {
        $id = 2;
        $success = 0;
        while ($success < 19) {
            $response = $this->http->request('POST', 'job/'.$id.'/proposal', [
                                    'headers' => [
                                        'Authorization' => 'Bearer ' . $this->loginFreelancer(),
                                        'Content-Type' => 'application/json'
                                    ],
                                    'json' => [
                                        'budget' => 50,
                                        'estimation_date' => 100,
                                        'summary' => 'Lorem ipsum'
                                    ]
                            ]);
        
            if($response->getStatusCode() == 201){
                $success++;
            }

            $id++;
        }
        
        $response = $this->http->request('POST', 'job/60/proposal', [
                                    'headers' => [
                                        'Authorization' => 'Bearer ' . $this->loginFreelancer(),
                                        'Content-Type' => 'application/json'
                                    ],
                                    'json' => [
                                        'budget' => 50,
                                        'estimation_date' => 100,
                                        'summary' => 'Lorem ipsum'
                                    ]
                            ]);
        
        $this->assertEquals(401, $response->getStatusCode());
        $contentType = $response->getHeaders()["Content-Type"][0];

        $this->assertEquals('application/json', $contentType);
        $body = json_decode($response->getBody()->getContents(), true);
        
        $this->assertArrayHasKey('error', $body);
        $this->assertContains('Reached maximum limit prososal', $body['error']);
    }
}

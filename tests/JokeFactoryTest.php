<?php

namespace Manojksrivastava\ChuckNorrisJokes\Tests;

use Manojksrivastava\ChuckNorrisJokes\JokeFactory;
use PHPUnit\Framework\TestCase;
use Unirest;
#require_once 'vendor/autoload.php';

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_joke()
    {
        # code...
        $jokes = new JokeFactory(['This is a joke',]);
        $joke = $jokes->getRandomJoke();
        $this->assertSame('This is a joke', $joke);
    }
    /** @test */
    public function it_returns_a_predefined_joke()
    {
        $chuckNorrisJokes = [
            'Chuck Norris doesn\’t read books. He stares them down until he gets the information he wants.',
            'Time waits for no man. Unless that man is Chuck Norris.',
            'When God said, “Let there be light!” Chuck said, “Say Please.”'
        ];

        $jokes = new JokeFactory();
        $joke = $jokes->getRandomJoke();
        $this->assertContains($joke,$chuckNorrisJokes);
    }
    /** @test */
    public function getCustomer()
    {
        $PRAHARI_BASE_URL='https://api.sandbox.gravity-legal.com/prahari/v1';
        $ENV_URL='https://api.sandbox.gravity-legal.com/pd/v1';
        $SYSTEM_TOKEN='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzaWQiOiJzYW5kYm94Iiwic3RpZCI6ImYzMDAyNmFmLTMxMjAtNDdmYy05MmRmLWFlNmMyZmEwMThiNSIsInRva2VuX3VzZSI6InN5c3RlbV90b2siLCJybmQiOjQ2NjQyNTEzMjEsImlhdCI6MTYwODY2NjI1MH0.-gtUMBkeIhdLilUJWiCgHWfROgCtWEcx_1gLlNWmVmo';
        $APP_ID='soluno';
        $ORG_ID='781ac60e-cff5-4971-8053-cddf5eec696f';

        $baseUrl = $ENV_URL . '/entities/';

        $API_KEY = array ('PRAHARI_BASE_URL' => $PRAHARI_BASE_URL, 'ENV_URL' => $ENV_URL, 
                            'SYSTEM_TOKEN' => $SYSTEM_TOKEN, 'APP_ID' => $APP_ID, 'ORG_ID' => $ORG_ID );

        $httpHeaders = array(
            'Authorization' => 'Bearer ' . $SYSTEM_TOKEN,
            'X-PRAHARI-APPID' => $APP_ID,
            'X-PRAHARI-ORGID' => $ORG_ID,
            'Content-Type' => 'application/json'
        );
        $headers = array('Accept' => 'application/json');
        $query = array('foo' => 'hello', 'bar' => 'world');
        $customerId = '7a72244e-4586-421d-85e5-a6a2d38188f0';
        $url = $baseUrl . 'Customer/' . $customerId;
        
        $response = Unirest\Request::get($url, $httpHeaders);
        echo $url;
        echo $response->code;        // HTTP Status code
        $response->headers;     // Headers
        $response->body;        // Parsed body
        $response->raw_body;    // Unparsed body
        echo  $response->raw_body; 
        var_dump(json_decode($response->raw_body));      
        $this->assertTrue($response->code == 200);
    }


}
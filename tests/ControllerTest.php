<?php

namespace Camspiers\CSP;

class ControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testIndex()
    {
        $logger = $this->getMock('Psr\Log\LoggerInterface');
        
        $logger->expects($this->once())
            ->method('info');
        
        $controller = new Controller($logger);
        $prop = new \ReflectionProperty(__NAMESPACE__.'\\Controller', 'response');
        $prop->setAccessible(true);
        $prop->setValue($controller, new \SS_HTTPResponse());
        
        $req = new \SS_HTTPRequest('GET', '/');
        $req->setBody(<<<JSON
{
  "csp-report": {
    "document-uri": "http://example.com/signup.html",
    "referrer": "",
    "blocked-uri": "http://example.com/css/style.css",
    "violated-directive": "style-src cdn.example.com",
    "original-policy": "default-src 'none'; style-src cdn.example.com; report-uri /_/csp-reports"
  }
}
JSON
        );
        
        $response = $controller->index($req);
        
        $this->assertEquals(204, $response->getStatusCode());
        $this->assertEquals('', $response->getBody());
    }
}
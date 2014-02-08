<?php

namespace Camspiers\CSP;

use Psr\Log\LoggerInterface;
use Controller as SilverStripeController;
use SS_HTTPRequest;

/**
 * Class Controller
 * @package Camspiers\CSP
 */
class Controller extends SilverStripeController
{
    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
        parent::__construct();
    }

    /**
     * @param SS_HTTPRequest $request
     * @return \SS_HTTPResponse
     */
    public function index(SS_HTTPRequest $request)
    {
        $this->response->setStatusCode(204);
        $this->response->setBody('');
        
        $report = json_decode($request->getBody(), true);
        
        if ($report && isset($report['csp-report'])) {

            $this->logger->info(
                'Content-Security-Policy violation',
                $report['csp-report']
            );
        }
        
        return $this->response;
    }
}
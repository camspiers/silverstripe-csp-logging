# SilverStripe Content-Security-Policy Logging

[![Build Status](https://travis-ci.org/camspiers/silverstripe-csp-logging.png?branch=master)](https://travis-ci.org/camspiers/silverstripe-csp-logging)

Allows the logging of CSP violations in SilverStripe

## Installation (with composer)

	composer require camspiers/silverstripe-csp-logging

## Usage

Provide an instance of `Psr\Log\LoggerInterface` to the CSP controller:

1. Create a file called `mysite/_config/csp.yml` and add your logging service to the controller

```yaml
Injector:
  Camspiers\CSP\Controller:
    constructor:
      0: %$Monolog
```

2. Set your Content-Security-Policy headers
3. Add "report-uri /csp-report/;" to the `Content-Security-Policy` header to log violations through SilverStripe

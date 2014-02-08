# SilverStripe Content-Security-Policy Logging

Allows the logging of CSP violations in SilverStripe

## Installation (with composer)

	composer require heyday/silverstripe-csp-logging

## Usage

Provide an instance of `Psr\Log\LoggerInterface` to the CSP controller:

1. Create a file called `mysite/_config/csp.yml` and add your logging service to the controller

```yaml
Injector:
  Heyday\CSP\Controller:
    constructor:
      0: %$Monolog
```

2. Set your Content-Security-Policy headers
3. Add "report-uri /csp-report/;" to the header to log violations through SilverStripe


Header always append Content-Security-Policy "report-uri /csp-report/; script-src 'self' https://fast.fonts.net https://www.google-analytics.com https://connect.facebook.net https://platform.linkedin.com https://fbstatic-a.akamaihd.net"

## Unit testing
    $ composer install --dev
    $ vendor/bin/phpunit
# DoApi
Digital ocean domain adding API

The base class is # DigitalOcean

### preliquisites
- php 7.0
- Composer
Run composer install to update the dependancies with your environment
Digital ocean requires an access token to access any account. The DigitalOcean class expects the environment variable DO_TOKEN to use for authentication. Export the token to the environment

```
export DO_TOKEN=get_access_token_from_digital_ocean_dashboard

```

test classes are under the test folder. To create a domain, update a test case with the designated domain name and then run the unit tests with these command

```
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/DoTest.php

```
sample success response should be
```
(
    [success] => 1
    [message] => {"domain":{"name":"vericom.com","ttl":null,"zone_file":null}}
)


Time: 1.86 seconds, Memory: 4.00 MB

OK (1 test, 1 assertion)

```

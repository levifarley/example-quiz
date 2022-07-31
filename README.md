Example Quiz
=======
**PHP** 8 | **Laravel** 9 | **Bootstrap** 5

## Prerequisites
You must have [Docker](https://www.docker.com/get-started) installed on your machine

## Installation
Copy the environment file: `cp .env.example .env`

```bash
# Install Laravel Sail dependencies
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs

# Start/setup application
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed
```

The application may be accessed via your browser at [http://localhost](http://localhost)

## General logic flow
Question: If you were going on a vacation, what car would you choose?

User selects Manufacturer -> Car model -> Color -> (submit) => Thank you message

The quiz submission sends POST request via ajax to /api/submit route that uses the appropriate service to handle the submission

## Pest
`./vendor/bin sail bin pest --coverage`

Example output:
```bash
PASS  Tests\Unit\ExampleTest
✓ that true is true

PASS  Tests\Feature\ExampleTest
✓ the application returns a successful response

Tests:  2 passed
Time:   0.14s

Cov:    58.62%
```

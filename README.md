# Project

This is a base structure for the project.

### Using [Common Directory structure](https://phptherightway.com/#common_directory_structure)
* public/ - directory for web server files
* src/ - directory for PHP source code files
* docker/ - directory for Docker configuration files and Dockerfiles
* bootstrap/ - directory contains the app.php file which bootstraps the framework.
* ventor/ - The vendor directory contains your Composer dependencies.

### Initial run
```bash
cp .env.example .env
docker compose up -d --build
docker compose exec app composer install
docker compose exec app composer dump-autoload
docker compose exec app php bin/add_user.php  
```

visit @ http://localhost:8001
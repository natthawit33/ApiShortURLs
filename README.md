# My Project

This project is a web application with an API backend built using Laravel. It allows users to register, login, and manage URLs. The web frontend interacts with the API to provide a seamless user experience.

## Technologies Used

- **Frontend**: Laravel Blade templates, HTML, CSS, Bootstrap.
- **Backend**: Laravel (PHP)
- **Database**: MySQL
- **API**: RESTful API built with Laravel
- **Authentication**: JWT (JSON Web Tokens)
- **HTTP Requests**: Axios for frontend API requests

## Features

- **User Authentication**: Registration, Login, and JWT-based Authentication
- **URL Management**: Users can create, read, update, and delete URLs
- **Redirect Short URLs**: Short URLs can be redirected to original URLs

## Installation

### Web Application

    1. Clone the repository
       ```bash
       git clone https://github.com/your-username/my-project.git
    2.Install Composer dependencies:
        cd my-project
        composer install
    3.Set up your .env file  Copy the .env.example file to .env
        cp .env.example .env
    4.Generate the application key
        php artisan key:generate
    **Configure API Endpoint: Update the .env file with the URL to your API server:  API_URL=http://127.0.0.1:8000/api/
    5.Run migrations (API)
        php artisan migrate
    6.Start the Laravel development server
        php artisan serve

## API
    The API is part of the same Laravel application. No additional setup is required for the API beyond the steps listed above.

API Endpoints:

    -POST /api/register: Register a new user.
    -POST /api/login: Login and get an authentication token.
    -GET /api/urls: List all URLs.
    -POST /api/urls: Create a new URL.
    -PUT /api/urls/{id}: Update an existing URL.
    -DELETE /api/urls/{id}: Delete a URL.
    -GET /api/r/{shortUrl}: Redirect a short URL to its original URL.
    
## Frontend Usage
    1.Navigate to the register or login page from the web interface to create a new account or log in.
    2.Once logged in, you can manage your URLs (add, edit, delete).
    3.Shortened URLs can be shared and accessed via the redirect feature.
    
## API Usage
    You can interact with the API using tools like Postman or by sending HTTP requests from the frontend. Ensure that you authenticate by sending the Authorization header with a valid JWT token.
 
    curl --location 'http://127.0.0.1:8000/api/register' \
    --header 'Content-Type: application/json' \
    --data-raw '{
    "name": "Test User",
    "email": "test@test.com",
    "password": "123456789",
    "password_confirmation": "123456789"
    }'


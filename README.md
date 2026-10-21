# Laravel Contact Management System

A web-based Contact Management System built with Laravel, PHP, and MySQL. The application allows authenticated users to manage their personal contacts through a dashboard and provides JWT-based authentication for protected API endpoints.

## Features

- User login and logout
- Dashboard for authenticated users
- JWT cookie-based authentication
- Protected routes and API endpoints
- Contact CRUD: create, read, update, and delete
- Search contacts by name, email, phone, and address
- User-specific contact access
- MySQL database with Laravel migrations
- Responsive Blade-based interface

## Technology Stack

- Backend: PHP and Laravel
- Database: MySQL
- Frontend: Blade, HTML, CSS, JavaScript
- Authentication: JWT
- API testing: Postman or an equivalent HTTP client
- Version control: Git and GitHub

## Requirements

Install the following before setting up the project:

- PHP version supported by the installed Laravel version
- Composer
- MySQL
- Node.js and npm, if frontend assets require them
- Git

## Installation

### 1. Clone the repository

```bash
git clone YOUR_GITHUB_REPOSITORY_URL
cd login_page
```

Replace `YOUR_GITHUB_REPOSITORY_URL` with your actual repository URL.

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Configure the environment

Copy `.env.example` to `.env`.

Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

Update the database settings in `.env` to match your local MySQL configuration.

### 4. Generate the application key

```bash
php artisan key:generate
```

Configure any additional authentication settings required by the project. Do not publish real passwords, API secrets, or JWT secrets.

### 5. Create the database

Create a MySQL database for this application and configure its name and credentials in `.env`.

### 6. Run database migrations

```bash
php artisan migrate
```

Only run the seeder after confirming its demo account credentials and required fields are configured safely.

### 7. Start the application

```bash
php artisan serve
```

Open `http://127.0.0.1:8000` in your browser.

## Database

Database migrations are stored in `database/migrations/`.

Seeders are stored in `database/seeders/`.

Migrations create the database schema. Seeders can populate the database with development or test data.

## JWT Authentication Flow

1. The user submits login credentials.
2. The server validates the credentials.
3. On successful authentication, the application issues a JWT.
4. The token is delivered using the project's configured cookie-based authentication flow.
5. Protected middleware validates the token and identifies the authenticated user.
6. The application authorizes access to protected routes and user-specific contacts.
7. Logout invalidates or clears authentication according to the implemented token and cookie handling.

The actual cookie flags, token expiry, and invalidation behavior depend on the application's implementation.

## API Testing

Use Postman or an equivalent HTTP client to test the configured API endpoints.

Recommended tests:

- Valid login
- Invalid login credentials
- Access to a protected endpoint while authenticated
- Access to a protected endpoint without authentication
- Contact operations with valid authentication
- Attempts to access another user's contacts

Save screenshots of actual request URLs, response status codes, and response bodies in `docs/api-testing/`. Do not include passwords, JWT tokens, cookies, or other secrets in screenshots.

## Screenshots

Add screenshots of the running application to the `screenshots/` directory:

- `login.png` — login page
- `dashboard.png` — authenticated dashboard

## Project Structure

```text
app/
  Http/Controllers/
  Models/
bootstrap/
config/
database/
  migrations/
  seeders/
resources/
  views/
routes/
screenshots/
docs/
  api-testing/
```

## Security Notes

- Never commit `.env`.
- Keep real credentials and secrets out of `.env.example`.
- Use test accounts for demonstrations.
- Ensure users can only access their own contacts.
- Do not publish authentication cookies or JWT tokens.

## License

This project is provided for evaluation and educational purposes. Laravel is an open-source framework licensed under the MIT License.

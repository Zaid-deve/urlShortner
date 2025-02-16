# URL Shortener

A simple and efficient URL shortener web application built with PHP, JavaScript (jQuery), and Tailwind CSS.

## Features
- Shorten long URLs into concise, easy-to-share links.
- Copy shortened URLs with one click.
- Backend API for URL shortening and redirection.
- Modern UI with Tailwind CSS.
- Error handling and validation.

## Tech Stack
- **Frontend:** HTML, CSS (Tailwind), JavaScript (jQuery)
- **Backend:** PHP (REST API)
- **Database:** MySQL

## Project Structure
```
URL-Shortener/
|── api/
│    │── config/
│    │    ├── vars.php               # database credentials
│    │    ├── db.php                 # Database connection file
│    │    ├── db.sql                 # Database sql file
│    │── handlers/
│    │    ├── getHandler.php         # Handles URL redirection
│    │    ├── postHandler.php        # Handles URL shortening logic
│    │
│    │── index.php                   # entry point point for api / get and post
│── public/
│    ├── styles/
│    │    ├── style.css          # Main stylesheet
│    ├──  scripts/
│    │    ├── index.js           # Frontend JavaScript logic
│
│── .htaccess                  # URL rewriting rules
│── index.php                  # Main entry point & API router
│── notFound.php               # Custom error page
│── README.md                  # Project documentation
```

## Installation & Setup
1. Clone the repository:
   ```sh
   git clone https://github.com/Zaid-deve/urlShortner.git
   cd urlShortner
   ```

2. Configure the database:
   - Import the provided SQL file into MySQL.
   - Update `/api/config/db.php` with your database credentials.

3. Start a local PHP server:
   ```sh
   php -S localhost:8000
   ```

4. Access the application in your browser:
   ```
   http://localhost:8000
   ```

## Dependencies
- **Frontend:**
  - jQuery (`cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js`)
  - Tailwind CSS (`cdn.tailwindcss.com`)

- **Backend:**
  - PHP 7+ (with MySQL extension)
  - MySQL database

## API Endpoints
### Shorten a URL
**POST** `/index.php`
```json
{
  "url": "https://example.com/long-url"
}
```
**Response:**
```json
{
  "success": true,
  "shortened_url": "http://localhost/urlShortner?code=b981c4"
}
```

### Redirect to Original URL
**GET** `/{shortcode}`
- Redirects to the original long URL.
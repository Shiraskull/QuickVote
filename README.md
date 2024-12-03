# Web Vote

Web Vote is a simple web application that allows users to create and participate in voting events. It is built with Laravel, a PHP framework that simplifies the development of modern web applications. This application provides a user-friendly interface for managing voting events, casting votes, and viewing results in real time.

## Features

- **Create Voting Events**: Admin users can create new voting events with customizable options (e.g., vote options, time limit).
- **Vote Participation**: Registered users can participate in voting events by selecting one or more options.
- **Real-Time Results**: Users can see voting results in real time as votes are cast.
- **Admin Dashboard**: Admins can manage voting events, view results, and close votes.
- **Authentication**: Users must register and log in to participate in voting events.

## Requirements
- PHP >= 8.1
- Composer
- Node.js and npm
- Database (e.g., MySQL, PostgreSQL, SQLite)

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/username/web-vote.git
   cd web-vote

2. Install dependencies:
    composer install
    npm install

3. Copy the .env.example file to .env

4. Generate application key: php artisan key:generate

5. Run database migrations : php artisan migrate

6. Start the development server : 
    - php artisan serve
    - npm run dev



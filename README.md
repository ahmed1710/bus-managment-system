
# Bus Management System

This is a Laravel-based Bus Management System that allows users to book seats on buses for their trips. The application provides an API for user registration, login, viewing trips, checking available seats, and booking seats.

## Features

- **User Registration**: Allows users to create an account.
- **User Login**: Allows users to log in and receive a JWT token for authentication.
- **Profile Management**: Allows users to view their profile.
- **Trip Management**: Users can view available trips and book seats on them.
- **Seat Booking**: Allows users to book seats if available.

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/yourusername/bus-managment-system.git
   ```

2. Navigate to the project folder:

   ```bash
   cd bus-managment-system
   ```

3. Install the dependencies:

   ```bash
   composer install
   ```

4. Copy the `.env.example` file to `.env`:

   ```bash
   cp .env.example .env
   ```

5. Generate the application key:

   ```bash
   php artisan key:generate
   ```

6. Set up your database in `.env` file:

   ```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=bus_managment_system
   DB_USERNAME=root
   DB_PASSWORD=
   ```

7. Run the migrations:

   ```bash
   php artisan migrate
   ```

## Authentication

The application uses JWT (JSON Web Token) for authentication. Here are the available routes for authentication:

- **POST `/register`**: Register a new user.
- **POST `/login`**: Log in a user and receive a JWT token.

Authenticated routes require the user to include the JWT token in the Authorization header.

## API Routes

### Public Routes
- **POST `/register`**: Register a new user.
- **POST `/login`**: Log in a user and get a JWT token.

### Authenticated Routes
Authenticated routes require a valid JWT token in the Authorization header.

- **GET `/profile`**: Get the authenticated user's profile.
- **POST `/logout`**: Log out the authenticated user.
- **GET `/trips`**: Get a list of available trips.
- **GET `/available-seats/{trip}`**: Get the list of available seats for a given trip.
- **POST `/book-seat/{tripId}`**: Book a seat on a given trip.

## Models

- **User**: Handles user data, authentication, and profile.
- **Trip**: Represents a trip with a bus, start and end stations, and available seats.
- **Booking**: Represents a booking of a seat for a user on a trip.
- **Seat**: Represents the individual seats on a bus for a trip.
- **Station**: Represents a station where trips can start or end.

## Example Usage

### Register a new user
```bash
POST /register
Content-Type: application/json

{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password123"
}
```

### Log in and get a JWT token
```bash
POST /login
Content-Type: application/json

{
  "email": "john@example.com",
  "password": "password123"
}
```

### View available trips
```bash
GET /trips
Authorization: Bearer {JWT_TOKEN}
```

### View available seats for a trip
```bash
GET /available-seats/{tripId}
Authorization: Bearer {JWT_TOKEN}
```

### Book a seat for a trip
```bash
POST /book-seat/{tripId}
Authorization: Bearer {JWT_TOKEN}
Content-Type: application/json

{
  "seat_number": 5
}
```

## Notes
- The `trip` maximum capacity depends on the bus capacity.
- JWT authentication is used for all authenticated routes.
- The system assumes that a trip has a valid bus and valid stations.

## License
This project is open-source and available under the [MIT License](LICENSE).

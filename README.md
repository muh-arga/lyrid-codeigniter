## Installation
1. Clone the repository:
    ```bash
    git clone
    ```
2. Navigate to the project directory:
    ```bash
    cd lyrid-codeigniter
    ```
3. Install dependencies using Composer:
    ```bash
    composer install
    ```
4. Set up environment variables by copying the example file and modifying it:
    ```bash
    cp .env.example .env
    ```
    Update the `.env` file with your database credentials and other necessary configurations.

## Running the Application
1. Run migrations to set up the database:
    ```bash
    php spark migrate
    ```

2. Run Seeder to populate the database with initial data:
    ```bash
    php spark db:seed
    ```

3. Start the development server:
    ```bash
    php spark serve
    ```

    The application will be accessible at `http://localhost:8080` (or the base URL you set in the `.env` file).

## Credentials
- Admin User:
    - username: admin
    - password: admin123

- Regular User:
    - username: user
    - password: user123
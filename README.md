# Xplor

## Description
In this project we have added APIs for customers and web endpoint for customers.

## Tech Stack

- PHP v8.3
- Laravel v11
- MySQL v8.0
- Latest node and npm version

## Installation
Follow these steps to set up and run the project locally:

1. **Clone the repository:**
    ```bash
    git clone <repository-url>
    ```

2. **Navigate to the project directory:**
    ```bash
    cd project-directory
    ```

3. **Install Composer Dependencies:**
    ```bash
    composer install
    ```

4. **Install NPM Dependencies:**
    ```bash
    npm install
    ```

5. **Create a copy of the `.env` file:**
    ```bash
    cp .env.example .env
    ```

6. **Generate an application key:**
    ```bash
    php artisan key:generate
    ```

7. **Setup database configuration in .env file**

8. **Run Migrations (and Seed, if needed):**
    ```bash
    php artisan migrate --seed
    ```

9. **Start the development server:**
    ```bash
    php artisan serve
    ```

10. **Access the application in your browser:**
    ```
    http://localhost:8000
    ```

## API Endpoints

### List Customer
- **Endpoint:** `/api/customers`
  - *Method:* GET
  - *Description:* Customers list.
  - *Example Usage:*
    ```bash
    curl -X GET http://localhost:8000/api/customers
    ```

### Create Customer
- **Endpoint:** `/api/customers`
  - *Method:* POST
  - *Description:* Create customer.
  - *Body Parameters:*
    - `name` (string, required): The name of the customer.
    - `email` (string, unique, required): Email of the customer.
  - *Example Usage:*
    ```bash
    curl -X POST -d "name=Customer Name&email=Customer Email" http://localhost:8000/api/customers
    ```

### Update Customer
- **Endpoint:** `/api/customers/{id}`
  - *Method:* PUT
  - *Description:* Update details of a specific customer by ID.
  - *Body Parameters:*
    - `name` (string, required): The name of the customer.
    - `email` (string, unique, required): Email of the customer.
  - *Example Usage:*
    ```bash
    curl -X PUT -d "name=Customer Updated Name&email=Customer Updated Email" http://localhost:8000/api/customers/{id}
    ```

### Delete Customer
- **Endpoint:** `/api/customers/{id}`
  - *Method:* DELETE
  - *Description:* Delete a specific customer by ID.
  - *Example Usage:*
    ```bash
    curl -X DELETE http://localhost:8000/api/customers/{id}
    ```


## Web Endpoints

### List Customer
- **Endpoint 1:** `/customers`
  - *Method:* GET
  - *Description:* Customers list.
  - *Example Usage:*
    ```bash
    GET http://localhost:8000/customers
    ```    

## PHP Unit Tests
- Currently PHP unit test cases are not included in this project but if necessary will write in future

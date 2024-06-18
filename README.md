Here are the basic instructions on how to access and interact with the API endpoints for the pyz_books table.
Step 1: Start the Laravel Development Server

First, you need to make sure your Laravel development server is running. Open your terminal and navigate to your Laravel project directory, then start the server using the following command:

## bash
php artisan serve

This will start the server and you'll see a message indicating the server is running, typically at http://127.0.0.1:8000.
Step 2: Accessing the API Endpoints

You can use tools like Postman, CURL, or a web browser to interact with the API endpoints. Here are the endpoints and instructions on how to use them:
1. List All Books

Endpoint: GET /api/pyz_books

Description: Retrieve a list of all books.

Example:

sh

curl -X GET http://127.0.0.1:8000/api/pyz_books

2. Get a Specific Book

Endpoint: GET /api/pyz_books/{id}

Description: Retrieve details of a specific book by its ID.

Example:

sh

curl -X GET http://127.0.0.1:8000/api/pyz_books/1

3. Create a New Book

Endpoint: POST /api/pyz_books

Description: Add a new book to the database.

Example:

sh

curl -X POST http://127.0.0.1:8000/api/pyz_books \
    -H "Content-Type: application/json" \
    -d '{"name": "New Book", "description": "This is a new book description.", "publication_date": "2024-06-18 12:00:00"}'

4. Update an Existing Book

Endpoint: PUT /api/pyz_books/{id}

Description: Update details of an existing book by its ID.

Example:

sh

curl -X PUT http://127.0.0.1:8000/api/pyz_books/1 \
    -H "Content-Type: application/json" \
    -d '{"name": "Updated Book Name", "description": "Updated description.", "publication_date": "2024-06-18 12:00:00"}'

5. Delete a Book

Endpoint: DELETE /api/pyz_books/{id}

Description: Delete a specific book by its ID.

Example:

sh

curl -X DELETE http://127.0.0.1:8000/api/pyz_books/1

Using Postman to Interact with the API

If you prefer using a GUI tool like Postman, follow these steps:

    Open Postman.

    Create a new request:
        Method: Select the HTTP method (GET, POST, PUT, DELETE).
        URL: Enter the API endpoint URL (e.g., http://127.0.0.1:8000/api/pyz_books).

    Set Headers (if necessary):
        For POST and PUT requests, set the Content-Type to application/json.

    Set Body (for POST and PUT requests):
        Select the raw option and choose JSON format.
        Enter the JSON payload, for example:

        json

    {
        "name": "New Book",
        "description": "This is a new book description.",
        "publication_date": "2024-06-18 12:00:00"
    }

Send the Request:

    Click the Send button to send the request and see the response.

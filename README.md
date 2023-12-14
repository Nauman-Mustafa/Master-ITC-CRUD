# Your Project Name

Master ITC Task 

## API Documentation

i have make the api end pointis api.php file 
### How to Run project 
connect database in the .evn file 
run  : miggrations
run  :command composer update
run   :php artisan serve 
test the api end point 
run : php artisan test  
### Task donne

=> Migration

=> Task Controller

index: Get a list of all tasks.

show: Get details of a specific task.

store: Create a new task.

update: Update the details of a task.

destroy: Delete a task.

markascomplete: update status complete

markasIncomplete: update status In-complete

=> Validation:

Implemented validation for creating and updating tasks.



=>Bonus
:
->Implement pagination for the task listing endpoint.

->Add the ability to mark a task as completed or not.

-> Implement unit tests for the API.



### Sample requests and responses.


 1. Get All Todos

- **Endpoint:** `GET /api/alltodos`
- **Description:** Retrieve a paginated list of all todos.
- **Request:**
  - No request parameters required.
- **Response:**
  ```json
  {
    "current_page": 1,
    "data": [
      {
        "id": 1,
        "title": "Todo 1",
        "status": true,
        "created_at": "2023-01-01T12:00:00Z",
        "updated_at": "2023-01-01T12:30:00Z"
      },
    ],
    "total": 10
  }

   2. Get Todo B id

- **Endpoint:** `GET /api/todo/{id}`
- **Description:**  Retrieve details of a specific todo by its ID.
- **Request:**
  -{id}: ID of the todo
- **Response:**
  ```json
  {
    "id": 1,
  "title": "Todo 1",
  "status": true,
  "created_at": "2023-01-01T12:00:00Z",
  "updated_at": "2023-01-01T12:30:00Z"
  }





    3. create Todo

- **Endpoint:** `POST /api/createtodo`
- **Description:**  Create a new todo.
- **Request:**
  -{
  "title": "New Todo",
  "status": false
}
- **Response:**
  ```json
  {
    "message": "Todo created successfully",
  "task": {
    "id": 11,
    "title": "New Todo",
    "status": false,
    "created_at": "2023-01-02T14:00:00Z",
    "updated_at": "2023-01-02T14:00:00Z"
  }
  }

      4. update  Todo

- **Endpoint:** `PUT /api/updatetodo/{id}`
- **Description:**  Update an existing todo by ID.
- **Request:**
  -{
  "title": "Updated Todo",
  "status": true
}
- **Response:**
  ```json
  {
     "message": "Todo updated successfully",
  "task": {
    "id": 11,
    "title": "Updated Todo",
    "status": true,
    "created_at": "2023-01-02T14:00:00Z",
    "updated_at": "2023-01-03T10:30:00Z"
  }
  }

     5. delete  Todo

- **Endpoint:** `DELETE /api/deletetodo/{id}`
- **Description:**  Delete an existing todo by ID.
- **Request:**
  - (No request body needed)
- **Response:**
  ```json
  {
    "message": "Todo deleted successfully"
  }


    

   6. mark  Todo as complete

- **Endpoint:** `PATCH /api/taskdone/{id}/complete`
- **Description:**   Mark an existing todo as complete by ID.
- **Request:**
  - (No request body needed)
- **Response:**
  ```json
  {
    "message": "Todo status changed to complete",
  "task": {
    "id": 11,
    "title": "Existing Todo",
    "status": true,
    "created_at": "2023-01-02T14:00:00Z",
    "updated_at": "2023-01-03T10:30:00Z"
  }
  }

  7. mark  Todo as INcomplete

- **Endpoint:** `PATCH /api/tasks-incomplete/{id}/incomplete`
- **Description:**   Mark an existing todo as incomplete  by ID.
- **Request:**
  - (No request body needed)
- **Response:**
  ```json
  {
    "message": "Todo status changed to incomplete",
  "task": {
    "id": 11,
    "title": "Existing Todo",
    "status": false,
    "created_at": "2023-01-02T14:00:00Z",
    "updated_at": "2023-01-03T10:30:00Z"
  }
  }
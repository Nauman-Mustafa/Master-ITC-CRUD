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


 1. Get All Task

- **Endpoint:** `GET /api/alltask`
- **Description:** Retrieve a paginated list of all Task.
- **Request:**
  - No request parameters required.
- **Response:**
  ```json
  {
    "current_page": 1,
    "data": [
      {
        "id": 1,
        "title": "Task 1",
        "status": true,
        "created_at": "2023-01-01T12:00:00Z",
        "updated_at": "2023-01-01T12:30:00Z"
      },
    ],
    "total": 10
  }

   2. Get Task By id

- **Endpoint:** `GET /api/task/{id}`
- **Description:**  Retrieve details of a specific Task by its ID.
- **Request:**
  -{id}: ID of the Task
- **Response:**
  ```json
  {
    "id": 1,
  "title": "Task 1",
  "status": true,
  "created_at": "2023-01-01T12:00:00Z",
  "updated_at": "2023-01-01T12:30:00Z"
  }





    3. create Task

- **Endpoint:** `POST /api/createtask`
- **Description:**  Create a new Task.
- **Request:**
  -{
  "title": "New Task",
  "status": false
}
- **Response:**
  ```json
  {
    "message": "Task created successfully",
  "task": {
    "id": 11,
    "title": "New Task",
    "status": false,
    "created_at": "2023-01-02T14:00:00Z",
    "updated_at": "2023-01-02T14:00:00Z"
  }
  }

      4. update  Task

- **Endpoint:** `PUT /api/updatetask/{id}`
- **Description:**  Update an existing Task by ID.
- **Request:**
  -{
  "title": "Updated Task",
  "status": true
}
- **Response:**
  ```json
  {
     "message": "Task updated successfully",
  "task": {
    "id": 11,
    "title": "Updated Task",
    "status": true,
    "created_at": "2023-01-02T14:00:00Z",
    "updated_at": "2023-01-03T10:30:00Z"
  }
  }

     5. delete  Task

- **Endpoint:** `DELETE /api/deletetask/{id}`
- **Description:**  Delete an existing Task by ID.
- **Request:**
  - (No request body needed)
- **Response:**
  ```json
  {
    "message": "Task deleted successfully"
  }


    

   6. mark  Task as complete

- **Endpoint:** `PATCH /api/taskdone/{id}/complete`
- **Description:**   Mark an existing Task as complete by ID.
- **Request:**
  - (No request body needed)
- **Response:**
  ```json
  {
    "message": "Task status changed to complete",
  "task": {
    "id": 11,
    "title": "Existing Task",
    "status": true,
    "created_at": "2023-01-02T14:00:00Z",
    "updated_at": "2023-01-03T10:30:00Z"
  }
  }

  7. mark  Task as INcomplete

- **Endpoint:** `PATCH /api/tasks-incomplete/{id}/incomplete`
- **Description:**   Mark an existing Task as incomplete  by ID.
- **Request:**
  - (No request body needed)
- **Response:**
  ```json
  {
    "message": "Task status changed to incomplete",
  "task": {
    "id": 11,
    "title": "Existing Task",
    "status": false,
    "created_at": "2023-01-02T14:00:00Z",
    "updated_at": "2023-01-03T10:30:00Z"
  }
  }
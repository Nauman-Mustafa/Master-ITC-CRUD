<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\TodosModal;
use Database\Factories\TodosModalFactory;
use App\Http\Controllers\TodosController;


class TodosControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_all_todos()
    {
      
        TodosModal::factory(5)->create();
        $response = $this->get('/api/alltodos');
        $response->assertStatus(200)
            ->assertJsonStructure(['current_page', 'data', 'total']);
    }
    public function test_can_get_todo_by_id()
    {
      
        $task = TodosModal::factory()->create();
        $response = $this->get("/api/todo/{$task->id}");
        $response->assertStatus(200)
            ->assertJson(['title' => $task->title]);

    }
    public function test_can_create_task()
    {

        $response = $this->json('POST', '/api/createtodo', [
            'title' => 'New Task',
            'status' => false,
        ]);
        $response->assertStatus(201)
        ->assertJsonStructure(['message', 'task'])
        ->assertJson([
            'message' => 'Task created sucessfully', // Note the spelling difference
            'task' => [
                'title' => 'New Task',
                'status' => false,
                'id' => $response['task']['id'], 
            ]
        ]);
    }

    public function test_validation_fails_when_creating_task_with_invalid_data()
    {
        $response = $this->json('POST', '/api/createtodo', [
            //  'title' should be string 
            'title' => 1,
            'status' => false,
        ]);
        $response->assertStatus(422)
            ->assertJsonStructure(['error']);

       
    }

    public function test_can_update_task()
    {
       
    $task = TodosModal::factory()->create();

    $response = $this->json('PUT', "/api/updatetodo/{$task->id}", [
        'title' => 'Updated Taskss',
        'status' => true,
    ]);

    if ($response->status() !== 200) {
        dump($response->content()); // Output the response content for debugging
    }

    $response->assertStatus(200)
        ->assertJsonStructure(['message', 'task'])
        ->assertJson([
            'message' => 'Task updated sucessfully', // Correct the spelling here
            'task' => [
                'title' => 'Updated Taskss',
                'status' => true,
                'id' => $task->id,
                // Add other expected keys as needed
            ]
        ]);
    }
    

    public function test_validation_fails_when_updating_task_with_invalid_data()
    {
        $task = TodosModal::factory()->create();

       
        $response = $this->json('PUT', "/api/updatetodo/{$task->id}", [
            // missing 'title'
            'status' => false,
        ]);
        $response->assertStatus(422)
            ->assertJsonStructure(['error']);
    }

    public function test_update_fails_when_task_not_found()
    {

        $response = $this->json('PUT', '/api/updatetodo/6', [
            'title' => 'Updated Task',
            'status' => true,
        ]);

        $response->assertStatus(404)
            ->assertJsonStructure(['error']);

      
    }

    public function test_can_delete_task()
    {
        $task = TodosModal::factory()->create();
        $response = $this->json('DELETE', "/api/deletetodo/{$task->id}");
        $response->assertStatus(200)
            ->assertJson(['message' => 'Task deleted successfully']);
        $this->assertDatabaseMissing('todos_modals', ['id' => $task->id]);
    }

    public function test_delete_fails_when_task_not_found()
    {
        $response = $this->json('DELETE', '/api/deletetodo/1');
        $response->assertStatus(404)
            ->assertJsonStructure(['error']);

        
    }
    public function test_can_mark_task_as_complete()
    {
     
        $task = TodosModal::factory()->create(['status' => false]);
        $response = $this->json('PATCH', "/api/taskdone/{$task->id}/complete");
        $response->assertStatus(200)
            ->assertJson(['message' => 'Task status changed to complete']);
        $this->assertDatabaseHas('todos_modals', ['id' => $task->id, 'status' => true]);
    }

    public function test_mark_as_complete_fails_when_task_not_found()
    {
        $response = $this->json('PATCH', '/api/taskdone/2/complete');
        $response->assertStatus(404)->assertJsonStructure(['error']);
    }

    public function test_can_mark_task_as_incomplete()
    {
   
        $task = TodosModal::factory()->create(['status' => true]);
           $response = $this->json('PATCH', "/api/tasks-incomplete/{$task->id}/incomplete");
        $response->assertStatus(200)
            ->assertJson(['message' => 'Task status changed to In-complete']);
        $this->assertDatabaseHas('todos_modals', ['id' => $task->id, 'status' => false]);
    }

    public function test_mark_as_incomplete_fails_when_task_not_found()
    {
       
        $response = $this->json('PATCH', '/api/tasks-incomplete/4/incomplete');
    $response->assertStatus(404)->assertJsonStructure(['error']);

       
    }

}
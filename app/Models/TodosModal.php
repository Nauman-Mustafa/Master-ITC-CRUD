<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodosModal extends Model
{
    use HasFactory;
    protected $table = 'todos_modals';
    protected $fillable = ['title', 'status'];
}

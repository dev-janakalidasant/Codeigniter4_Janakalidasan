<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistrationModel extends Model{

    protected $table = 'register_user'; // Change 'users' to your actual table name
    protected $primaryKey = 'id'; // Change 'id' to your actual primary key field

    protected $allowedFields = ['name', 'email', 'password'];
 
}


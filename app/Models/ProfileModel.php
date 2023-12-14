<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'user_profile';
    // protected $primaryKey = 'id';
    protected $allowedFields = ['id','firstname', 'lastname', 'dob', 'mobileno','experience', 'gender', 'city', 'state', 'country', 'zip', 'image'];
}

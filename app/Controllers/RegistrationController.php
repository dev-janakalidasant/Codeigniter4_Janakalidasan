<?php

namespace App\Controllers;


use App\Models\RegistrationModel;
use CodeIgniter\Controller;
class RegistrationController extends Controller
{
    public function register()
    {
        return view('Registration');
    }
    public function submitForm(){
        $model = new RegistrationModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            // 'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'password' => $this->request->getPost('password'),
        ];
        $model->insert($data);
        return redirect()->to('/loginpage');
    }
    
    // public function submitForm()
    // {
    //     $session = session();

    //     // Retrieve form data
    //     $name = $this->request->getPost('name');
    //     $dob = $this->request->getPost('dob');
    //     $email = $this->request->getPost('email');
    //     $password = $this->request->getPost('password');
 
    //     // Store user data in session
    //     $userData = [
    //         'name' => $name,
    //         'dob' => $dob,
    //         'email' => $email,
    //         'password' => $password, // Note: In a real application, you should hash the password.
    //     ];

    //     $session->set('user_data', $userData);
    //     return redirect()->to('/loginpage');
    // }

   
    
    
}

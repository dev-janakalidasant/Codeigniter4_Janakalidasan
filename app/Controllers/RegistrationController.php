<?php

namespace App\Controllers;

class RegistrationController extends BaseController
{
    public function index()
    {
        return view('Registration');
    }
    
    public function submitForm()
    {
        $session = session();

        // Retrieve form data
        $name = $this->request->getPost('name');
        $dob = $this->request->getPost('dob');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
 
        // Store user data in session
        $userData = [
            'name' => $name,
            'dob' => $dob,
            'email' => $email,
            'password' => $password, // Note: In a real application, you should hash the password.
        ];

        $session->set('user_data', $userData);
        return redirect()->to('/loginpage');
    }
    
    
}

<?php

namespace App\Controllers;
use App\Models\RegistrationModel;
use CodeIgniter\Controller;
class LoginController extends Controller
{
   
    public function index()
    {
        return view('login');
    }
    public function loginsuccess(){
        $model = new RegistrationModel();
         
        // Get user input
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        // Validate user credentials
        $user = $model->where('email', $email)
            ->where('password', $password)
            ->first();

        if ($user) {
            // Redirect to a dashboard or home page
            return redirect()->to('/successmsg');
        } else {
            // Invalid credentials, redirect back to login page with an error message
            return redirect()->to('/')->with('error', 'Invalid email or password');
           
        }
        
    }


    // public function loginsuccess(){
    //     $session = session();

    //     // Retrieve form data
    //     $email = $this->request->getPost('email');
    //     $password = $this->request->getPost('password');

    //     // Retrieve user data from session
    //     $userData = $session->get('user_data');

    //     // Check if email and password match the stored data
    //     if ($userData && $userData['email'] === $email && $userData['password'] === $password) {
    //         // Authentication successful
    //         $session->set('logged_in', true);

    //         // Redirect to a secured area or display a success message
    //         return redirect()->to('/successmsg');
    //     } else {
    //         // Authentication failed, redirect to login form with an error message
    //         return redirect()->to('/loginpage')->with('error', 'Invalid email or password');
    //     }
    // }
    public function successmsg()
    {
       
    
        // Display success message with Bootstrap styling
        echo '<!DOCTYPE html>';
        echo '<html lang="en">';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>Success Page</title>';
        echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">';
        echo '</head>';
        echo '<body>';
    
        echo '<div class="container mt-5">';
        echo '<div class="row mt-5">';
        
        echo '<div class="col-lg-4 mt-5"></div>'; // Empty column on the left
        
        echo '<div class="col-lg-4 mt-5">';
        echo '<div class="card  text-white" style="background-color:#1515bb66;">';
        echo '<div class="card-body">';
        echo '<h3 class="card-title text-center">Successfully Logged In</h3>';
    
    
        echo '</div>'; // Close card-body
        echo '</div>'; // Close card
        echo '</div>'; // Close col-lg-4
    
        echo '<div class="col-lg-4 mt-5"></div>'; // Empty column on the right
        
        echo '</div>'; // Close row
        echo '</div>'; // Close container
    
        echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>';
        echo '</body>';
        echo '</html>';
    }
    
    
}

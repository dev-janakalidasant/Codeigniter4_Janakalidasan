<?php

namespace App\Controllers;

use App\Models\profileModel;
use CodeIgniter\Controller;

class ProfileController extends Controller
{
    public function profile()
    {
        $session = session();
        $userData = $session->get('user_data');
        return view('profile',$userData);
    }


    public function submitProfile()
    {
        $model = new ProfileModel();
        $fileinfo = $this->request->getFile("image");
        if (!empty($fileinfo)) {
            $data = [
                'id' => $this->request->getPost('id'),
                'firstname' => $this->request->getPost('firstname'),
                'lastname' => $this->request->getPost('lastname'),
                'dob' => $this->request->getPost('dob'),
                'mobileno' => $this->request->getPost('mobileno'),
                'experience' => $this->request->getPost('experience'),
                'gender' => $this->request->getPost('gender'),
                'city' => $this->request->getPost('city'),
                'state' => $this->request->getPost('state'),
                'country' => $this->request->getPost('country'),
                'zip' => $this->request->getPost('zip'),
                'image' => $fileinfo->getName(),
            ];
            $fileName = $fileinfo->getName();
            if ($fileinfo->move("profileimage", $fileName)) {
                $model->insert($data);
                return redirect()->to('/profilelist');
             
            } else {
                echo "Failed to move";
            }
        } else {
            echo "failed 2";
        }
      
    }

    public function profilelist()
    {
        $session = session();
        $userData = $session->get('user_data');
        $model = new ProfileModel();
        $data['profiles'] = $model->findAll();
        return view('profiledetail', $data);
    }
}

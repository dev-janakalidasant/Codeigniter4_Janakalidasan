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

    public function submitupdate()
    {
        $model = new ProfileModel();
        $fileinfo = $this->request->getFile("image");
        
        // Check if a new image is uploaded
        if ($fileinfo->isValid() && !$fileinfo->hasMoved()) {
            $fileName = $fileinfo->getName();
            $fileinfo->move("profileimage", $fileName);
            $updateImage = true;
        } else {
            // If no new image is uploaded, use the existing image name
            $fileName = $this->request->getPost('current_image'); // Assuming you have a hidden input in your form for the current image
            $updateImage = false;
        }
        
        $id = $this->request->getPost('id');
        $data = [
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
        ];
        
        // Update the image only if a new image is uploaded
        if ($updateImage) {
            $data['image'] = $fileName;
        }
        
        $model->update($id, $data);
        return redirect()->to('/profilelist');
        
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

<?php

namespace App\Controllers;

use App\Models\FormModel;
use CodeIgniter\Controller;

class FormController extends Controller
{
    public function index()
    {
        $session = session();
        $userData = $session->get('user_data');
        $model = new FormModel();
        $data['forms'] = $model->findAll();
        return view('form', $data,$userData);
    }


    //Submit data on db
    public function submitForm()
    {
        // $model = new FormModel();

        // $data = [
        //     'name' => $this->request->getPost('name'),
        //     'email' => $this->request->getPost('email'),
        //     'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
        // ];

        // $model->insert($data);

        // return redirect()->to('/');
        $model = new FormModel();
        $fileinfo = $this->request->getFile("profile_image");

        if (!empty($fileinfo)) {
            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                'profile_image' => $fileinfo->getName(),
            ];
            $fileName = $fileinfo->getName();
            if ($fileinfo->move("images", $fileName)) {
                $model->insert($data);
                return redirect()->to('/');
            } else {
                echo "Failed to move";
            }
        } else {
            echo "failed 2";
        }

    }
    //update data
    public function update($id)
    {
        $model = new FormModel();
        $fileinfo = $this->request->getFile("profile_image");

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            // 'profile_image' => $fileinfo->getName(),
            // Add other fields as needed
        ];
        $model->update($id, $data);

        return redirect()->to('/');
    }


    //Detele data
    public function delete($id)
    {
        $model = new FormModel();
        $model->delete($id);

        return redirect()->to('/');
    }
}

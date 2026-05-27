<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    public function index()
{
    // Pansamantalang huwag muna nating tawagin si UserModel para hindi mag-error ang pahina habang blangko pa ang database.
    $data = [
        'users' => [], 
        'pager' => null,
    ];
    return view('user_profile', $data); 
}

    public function upload()
    {
        $userModel = new UserModel();

        // 1. Validate file is an image, check MIME type and size (Step 2 in your image)
        $rules = [
            'name' => 'required|min_length[3]',
            'avatar' => [
                'rules' => 'uploaded[avatar]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]',
                'errors' => [
                    'uploaded' => 'Please choose a file to upload.',
                    'is_image' => 'The file must be an image.',
                    'mime_in'  => 'Only JPG, JPEG, and PNG files are allowed.',
                    'max_size' => 'The file size cannot exceed 2MB.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            // If validation fails, reload the index view with errors
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. Get the file instance
        $file = $this->request->getFile('avatar');

        if ($file->isValid() && !$file->hasMoved()) {
            // Generate a unique random name to prevent overwriting files with the same name
            $newName = $file->getRandomName();

            // 3. Move to public/uploads/
            $file->move(ROOTPATH . 'public/uploads/', $newName);

            // 4. Store path/name in database
            $userModel->save([
                'name'   => $this->request->getPost('name'),
                'avatar' => $newName
            ]);

            return redirect()->to('/users')->with('success', 'Profile created successfully!');
        }

        return redirect()->back()->with('error', 'File upload failed.');
    }

    public function login()
    {
        return view('login_view');
    }
}
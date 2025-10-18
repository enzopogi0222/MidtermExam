<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if ($this->request->getMethod() === 'POST') {
            return $this->processLogin();
        }
        
        return view('login');
    }
    
    private function processLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        // Validate input
        if (empty($username) || empty($password)) {
            return redirect()->back()->with('error', 'Username and password are required.');
        }
        
        // Authenticate user
        $user = $this->authenticateUser($username, $password);
        
        if (!$user) {
            return redirect()->back()->with('error', 'Invalid username or password.');
        }
        
        // Set session data
        session()->set([
            'user_id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'role' => $user['role'],
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'full_name' => $user['first_name'] . ' ' . $user['last_name'],
            'logged_in' => true
        ]);
        
        // Redirect based on role
        return $this->redirectByRole($user['role']);
    }
    
    private function authenticateUser($username, $password)
    {
        $userModel = new UserModel();
        $user = $userModel->findByUsername($username);
        
        if ($user && $userModel->verifyPassword($password, $user['password'])) {
            return $user;
        }
        
        return false;
    }
    
    private function redirectByRole($role)
    {
        switch ($role) {
            case 'student':
                return redirect()->to('/announcements');
            case 'teacher':
                return redirect()->to('/teacher/dashboard');
            case 'admin':
                return redirect()->to('/admin/dashboard');
            default:
                return redirect()->to('/announcements');
        }
    }
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('message', 'You have been logged out successfully.');
    }
}

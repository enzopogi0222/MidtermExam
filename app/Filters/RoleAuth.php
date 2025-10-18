<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Role-based Authorization Filter
 * 
 * Restricts access to routes based on user roles:
 * - Admins: Can access /admin/* routes
 * - Teachers: Can access /teacher/* routes  
 * - Students: Can access /student/* routes and /announcements
 */
class RoleAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/announcements')->with('error', 'Access Denied: Please log in first');
        }
        
        $userRole = session()->get('role');
        $currentUri = $request->getUri()->getPath();
        
        // Normalize the URI for consistent matching
        $currentUri = str_replace('/index.php', '', $currentUri);
        $normalizedUri = '/' . trim($currentUri, '/');
        
        switch ($userRole) {
            case 'admin':
                // Admins can access any route starting with /admin
                if (strpos($normalizedUri, '/admin') === 0) {
                    return; // Allow access
                }
                break;
                
            case 'teacher':
                // Teachers can only access routes starting with /teacher
                if (strpos($normalizedUri, '/teacher') === 0) {
                    return; // Allow access
                }
                break;
                
            case 'student':
                // Students can access routes starting with /student and /announcements
                if (strpos($normalizedUri, '/student') === 0 || $normalizedUri === '/announcements') {
                    return; // Allow access
                }
                break;
        }
        
        // If we reach here, access is denied
        return redirect()->to('/announcements')->with('error', 'Access Denied: Insufficient Permissions');
    }
    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action needed after request
    }
}

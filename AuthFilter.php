<?php namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = \Config\Services::session();
        $currentUri = service('uri')->getPath(); // Get the current URI path

        // Check if user is logged in
        if (!$session->get('isLoggedIn')) {
            // If not logged in, and trying to access register, allow it.
            // Otherwise, redirect to login for protected pages.
            if ($currentUri !== 'register') { // Assuming 'register' is your registration route
                return redirect()->to('/login')->with('error', 'Please log in to access this page.');
            }
            // If not logged in and accessing 'register', allow the request to proceed to the registration form.
            return;
        }

        // --- NEW LOGIC START ---
        // If user is logged in and tries to access the registration page, redirect them.
        if ($session->get('isLoggedIn') && $currentUri === 'register') {
            $userRole = $session->get('role');
            if ($userRole === 'admin') {
                return redirect()->to('/admin/dashboard')->with('info', 'You are already logged in as an admin.');
            } elseif ($userRole === 'cashier') {
                // For cashiers, ensure their status is checked before redirecting
                $userModel = new \App\Models\UserModel();
                $user = $userModel->find($session->get('id'));

                if ($user && $user['status'] === 'pending') {
                    return redirect()->to('/cashier/pending')->with('info', 'Your account is pending approval.');
                }
                return redirect()->to('/cashier/dashboard')->with('info', 'You are already logged in as a cashier.');
            }
            // Default redirect if role is not admin or cashier, or if no specific dashboard
            return redirect()->to('/dashboard')->with('info', 'You are already logged in.');
        }
        // --- NEW LOGIC END ---


        // Existing logic for role-based access control
        if (isset($arguments[0])) {
            $requiredRole = $arguments[0];
            $userRole = $session->get('role');

            if ($userRole !== $requiredRole) {
                // Redirect based on role if they try to access a forbidden area
                if ($userRole === 'admin') {
                    return redirect()->to('/admin/dashboard')->with('error', 'Access denied to this section.');
                } elseif ($userRole === 'cashier') {
                    // Check cashier status for redirection
                    $userModel = new \App\Models\UserModel();
                    $user = $userModel->find($session->get('id'));

                    if ($user && $user['status'] === 'pending') {
                        return redirect()->to('/cashier/pending')->with('error', 'Your account is pending approval.');
                    }
                    return redirect()->to('/cashier/dashboard')->with('error', 'Access denied to this section.');
                }
                return redirect()->to('/login')->with('error', 'You do not have permission to access this page.');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here if needed after the controller method runs
    }
}

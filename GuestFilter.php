<?php namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class GuestFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = \Config\Services::session();

        if ($session->get('isLoggedIn')) {
            $role = $session->get('role');

            // Redirect to respective dashboard based on role
            if ($role === 'admin') {
                return redirect()->to('/admin/dashboard')->with('info', 'You are already logged in as admin.');
            } elseif ($role === 'cashier') {
                $userModel = new \App\Models\UserModel();
                $user = $userModel->find($session->get('id'));

                if ($user && $user['status'] === 'pending') {
                    return redirect()->to('/cashier/pending')->with('info', 'Your account is pending approval.');
                }
                return redirect()->to('/cashier/dashboard')->with('info', 'You are already logged in as cashier.');
            }

            return redirect()->to('/dashboard')->with('info', 'You are already logged in.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Nothing needed after
    }
}

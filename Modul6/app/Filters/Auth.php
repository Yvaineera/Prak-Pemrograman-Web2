<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $excludedRoutes = [
            'login',
            'register'
        ];

        $currentURI = $request->getUri()->getPath();
        log_message('debug', 'Current URI: ' . $currentURI);
        
        // Exclude specified routes from authentication check
        if (in_array($currentURI, $excludedRoutes)) {
            return;
        }

        // Check if user is logged in
        if (!session()->get('logged_in')) {
            log_message('debug', 'User not logged in, redirecting to login.');
            return redirect()->to('/login')->with('error', 'Login terlebih dahulu!');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something after request is processed
    }
}
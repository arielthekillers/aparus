<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class authFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (uri_string() !== 'transactions/callback') {
            if (!session('username')) {
                return redirect()->to('auth/login');
            }
        }

        // } else {
        //     if (!session('role')) {
        //         return redirect()->to('auth/switcher');
        //     }
        // }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}

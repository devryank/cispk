<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class ValidateLogin implements FilterInterface
{
    protected $session;

    public function before(RequestInterface $request)
    {
        $this->session = \Config\Services::session();
        if(!$this->session->has('username'))
        {
            return redirect()->route('auth');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
       
    }
    
}

<?php

namespace Admin\Asm\Controllers\Client;

use Admin\Asm\Commons\Controller;
use Admin\Asm\Model\Flight;

class HomeController extends Controller
{
    public function index()
    {

        $page = $_GET['page'] ?? 1; // Get the current page from the query parameters
        $flightModel = new Flight();
        [$flights, $totalPage] = $flightModel->paginate($page, 6); // 6 flights per page

        $this->renderViewClient('home', [
            'flights' => $flights,
            'totalPage' => $totalPage,
            'currentPage' => $page
        ]);
    }
    public function showFlightDetail($id)
    {
        $flightModel = new Flight();
        $flight = $flightModel->findByID($id);
        $this->renderViewClient('show', ['flight' => $flight]);
    }
    
}

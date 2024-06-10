<?php

namespace Admin\Asm\Controllers\Admin;

use Admin\Asm\Commons\Controller;
use Admin\Asm\Model\Flight;
use Admin\Asm\Model\User;

class DashboardController extends Controller
{
    private Flight $flight;
    private User $user;

    public function __construct()
    {
        $this->flight = new Flight();
        $this->user = new User();
    }

    public function dashboard()
    {
        // Get total flight count
        $totalFlightCount = $this->flight->getTotalFlightCount();

        // Get user count by registration date
        $userCountBycreated_at = $this->user->getUserCountBycreated_at();

        // Pass data to the view
        $this->renderViewAdmin('dashboard', [
            'totalFlightCount' => $totalFlightCount,
            'userCountBycreated_at' => $userCountBycreated_at,
        ]);
    }
}

<?php
namespace App\Controller;

class DashboardController {

    public function show() {

        if (!file_exists("/home/carlos/morale.txt")) {
            echo "<h1>Carlos's morale destroyed!</h1>";
            echo "<p>Flag: " . file_get_contents("/flag.txt") . "</p>";
            return;
        }

        echo "<h1>Dashboard</h1>";
        echo "<p>Carlos's morale still intact.</p>";
        echo "<p>Session loaded from /api/session</p>";
    }
}

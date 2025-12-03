<?php
namespace App\Controller;

class LoginController {
    public function show() {
        echo "<h1>Login</h1>";
        echo "<p>Session cookie will be generated.</p>";
        echo "<a href='/dashboard'>Continue</a>";
    }
}

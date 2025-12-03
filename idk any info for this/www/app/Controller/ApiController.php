<?php
namespace App\Controller;

class ApiController {

    public function loadSession() {

        $secret = getenv("SECRET_KEY");

        if (!isset($_COOKIE['session'])) {
            // Generate a Symfony-like remember-me cookie
            $token = base64_encode(serialize((object)["user" => "guest"]));
            $sig   = hash_hmac("sha1", $token, $secret);

            setcookie("session", base64_encode(json_encode([
                "token" => $token,
                "sig_hmac_sha1" => $sig
            ])), 0, "/");

            echo "Session initialized.";
            return;
        }

        $decoded = json_decode(base64_decode($_COOKIE['session']), true);

        $token = $decoded["token"];
        $sig   = $decoded["sig_hmac_sha1"];

        if (!hash_equals(hash_hmac("sha1", $token, $secret), $sig)) {
            die("Cookie signature invalid. Debug at /debug/phpinfo. Framework: Symfony 4.3.6");
        }

        // VULNERABLE: unsafe PHP serialization
        $obj = unserialize(base64_decode($token));

        echo "Loaded session for user: " . htmlspecialchars($obj->user);
    }
}

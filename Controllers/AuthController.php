<?php

namespace App\Controllers;

use Firebase\JWT\ExpiredException;
use Firebase\JWT\SignatureInvalidException;
use Firebase\JWT\BeforeValidException;
use Firebase\JWT\JWT;

function validate_jwt_token($jwt_token, $secret_key) {
    try {
        return JWT::decode($jwt_token, $secret_key, array('HS256'));
    } catch (ExpiredException $e) {
        throw new Exception('Token expired');
    } catch (SignatureInvalidException $e) {
        throw new Exception('Invalid token signature');
    } catch (BeforeValidException $e) {
        throw new Exception('Token not valid yet');
    } catch (Exception $e) {
        throw new Exception('Invalid token');
    }
}

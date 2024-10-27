<?php
function validate_login(string $login) {
    return preg_replace('#[^a-zA-Z\-_0-9]+#','',$login);
}
function validate_name(string $name) {
    return preg_replace('#[^a-zA-Z\-_0-9\-{6,20}]#', '',$name);
}
function validate_password(string $pass) {
    return preg_replace('#[^a-zA-Z\-_0-9\-{6,20}]+#', '', $pass);
}
<?php

$password = 'secret123'; // mot de passe que tu veux

echo password_hash($password, PASSWORD_DEFAULT);
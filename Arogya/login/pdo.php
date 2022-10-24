<?php
$pdo = new PDO ('mysql:host=localhost;port=8889;dbname=user_db','andrew','zap');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


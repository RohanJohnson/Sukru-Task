<?php
require "includes/init.php";

$db = new Database();
return $db->getConn();
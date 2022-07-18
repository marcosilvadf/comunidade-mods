<?php
require_once '../dao/adminDAO.php';

$userId = $_GET['userId'];
$modUserId = $_GET['modUserId'];
$modId = $_GET['modId'];
$value = $_GET['value'];

$adminDAO = new AdminDAO();
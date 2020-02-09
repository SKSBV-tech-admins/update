<?php
session_start();

if (!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
    header("location: login.php");
}else{
    header("location: ./PORTAL/portal-1-dashboard.php");
}
<?php
//Author: Luuk Vesters
//Date: 12/6/2023
//File: index.php

session_start();
session_destroy();
header("Location: ../pages/login.php");
?>

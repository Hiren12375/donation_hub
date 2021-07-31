<?php
session_start();
if(isset($_SESSION['volunteer']) || isset($_SESSION['donor']))
    session_destroy();
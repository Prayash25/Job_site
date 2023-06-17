<?php
session_start();
if(!isset($_SESSION['jwt'])|| empty($_SESSION['jwt'])) {
    unset($_SESSION['jwt']);
}
session_destroy();
header('Refresh: 1; URL=http://localhost/3rd_jobsite/login.html');
                exit( json_encode([
                    'message'=>'Logging out successfully...',
                  ]));
?>
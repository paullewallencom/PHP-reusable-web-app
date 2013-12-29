<?php
$project = substr(dirname($SCRIPT_NAME),
        strrpos(dirname($SCRIPT_NAME), "/") + 1);
require("../phphomeprojectconfig.php");
require("../project_bar.php");
require("../project_main.php");
?>
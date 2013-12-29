<?php
require("../../header.php");
require("../phphomeprojectconfig.php");
$project = substr(dirname($SCRIPT_NAME),
        strrpos(dirname($SCRIPT_NAME), "/") + 1);
require("../project_main.php");
require("../../footer.php");
?>
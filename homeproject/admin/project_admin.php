<?php
session_start();
require("../phphomeprojectconfig.php");
require_once("../project_functions.php");
pf_protect_admin_page();
require("../db.php");
function menu_options() {
    $projsql = "SELECT * FROM homeproject_projects WHERE
id = " . $_SESSION['SESS_PROJECTID'] . ";";
    $projresult = mysql_query($projsql);
    $projrow = mysql_fetch_assoc($projresult);
    echo "<p>";
    echo "<strong>" . $projrow['name'] . "
Administration</strong>";
    echo "<br>";
    echo "<a href='" . $SCRIPT_NAME
            . "?func=general'>General</a>";
    echo " &bull; ";
    echo "<a href='" . $SCRIPT_NAME
            . "?func=downloads'>Manage Downloads</a>";
    echo " &bull; ";
    echo "<a href='" . $SCRIPT_NAME . "?func=newproject'>
Add New Project</a>";
    echo " &bull; ";
    echo "<a href='" . $SCRIPT_NAME
            . "?func=screenshots'>Manage Screenshots</a>";
    echo " &bull; ";
    echo "<a href='" . $SCRIPT_NAME
            . "?func=changeproject'>Admin Another Project</a>";
    echo "</p>";
}
function include_header() {
    global $config_headerfile;
    if(file_exists($config_headerfile)) {
        include($config_headerfile);
    }
}
if($_GET['id']) {
    if(is_numeric($_GET['id']) == TRUE) {
        $validid = $_GET['id'];
    }
    else {
        header("Location: " . $config_projecturl);
    }
}
switch($_GET['func']) {
    case "general":
        include_header();
        menu_options();
        require("project_admingeneral.php");
        exit;
        break;
    case "downloads":
        if(!$_POST) {
            include_header();
            menu_options();
        }
        require("project_admindownloads.php");
        break;
    case "newproject":
        if(!$_POST) {
            include_header();
        }
        require("project_adminnewproject.php");
        break;
    case "deleterelease":
        if(isset($_GET['conf']) == FALSE) {
            include_header();
            menu_options();
        }
        require("project_admindeleterelease.php");
        break;
    case "screenshots":
        if(!$_POST) {
            include_header();
            menu_options();
        }
        require("project_adminaddscreenshot.php");
        break;
    case "deletescreenshot":
        if(isset($_GET['conf']) == FALSE) {
            include_header();
            menu_options();
        }
        require("project_admindeletescreenshot.php");
        break;
    default:
        if($_SESSION['SESS_PROJECTID']) {
            header("Location: " . $config_projectadminbasedir
                    . basename($SCRIPT_NAME) . "?func=main");
        }
        else {
            include_header();
            echo "<h1>Choose a project</h1>";
            echo "<p>Which project would you like to administer?</p>";
            $projsql = "SELECT * FROM homeproject_projects;";
            $projresult = mysql_query($projsql);
            $projnumrows = mysql_num_rows($projresult);
            if($projnumrows == 0) {
                echo "<p>No projects!</p>";
            }
            else {
                echo "<ul>";
                while($projrow = mysql_fetch_assoc($projresult)) {
                    echo "<li><a href='" . $SCRIPT_NAME
                            . "?func=setproject&id=" . $projrow['id'] . "'>" . $projrow['name']
                            . "</a></li>";
                }
                echo "</ul>";
            }
            echo "<a href='" . $SCRIPT_NAME . "?func=newproject'>
Create a new project</a>";
        }
        break;
}
case "setproject":
$pathsql = "SELECT * FROM homeproject_projects WHERE id = "
        . $validid . ";";
$pathresult = mysql_query($pathsql);
$pathrow = mysql_fetch_assoc($pathresult);
session_register("SESS_PROJECTID");
session_register("SESS_PROJECTPATH");
$_SESSION['SESS_PROJECTID'] = $validid;
$_SESSION['SESS_PROJECTPATH'] = $pathrow['pathname'];
header("Location: " . $config_projectadminbasedir
        . basename($SCRIPT_NAME) . "?func=main");
break;
case "changeproject":
session_destroy();
header("Location: " . $config_projectadminbasedir
        . basename($SCRIPT_NAME));
break;
case "main":
include_header();
$projsql = "SELECT * FROM homeproject_projects WHERE id = "
        . $_SESSION['SESS_PROJECTID'] . ";";
$projresult = mysql_query($projsql);
$projrow = mysql_fetch_assoc($projresult);
echo "<h1>" . $projrow['name'] . " Administration</h1>";
menu_options();
exit;
break;
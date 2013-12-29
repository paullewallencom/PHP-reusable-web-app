<?php
require("db.php");
$projsql = "SELECT * FROM homeproject_projects WHERE
pathname = '" . $project . "';";
$projresult = mysql_query($projsql);
$projrow = mysql_fetch_assoc($projresult);
$project_id = $projrow['id'];
$project_name = $projrow['name'];
switch($_GET['func']) {
    case "download":
        require("download.php");
        break;
    case "screenshots":
        require("screenshots.php");
        break;
    default:
        $sql = "SELECT * FROM homeproject_projects
WHERE pathname = '" . $project . "';";
        $result = mysql_query($sql);
        $row = mysql_fetch_assoc($result);
        echo "<h1>" . $row['name'] . "</h1>";
        echo "<p>" . $row['about'] . "</p>";
        break;
}
?>
<?php
require_once("../project_functions.php");
pf_protect_admin_page();
$sql = "SELECT * FROM homeproject_projects WHERE id = "
        . $_SESSION['SESS_PROJECTID'] . ";";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
if($_POST['submit']) {
    $updsql = "UPDATE homeproject_projects SET"
            . " name = '" . pf_fix_slashes($_POST['name']) . "'"
            . ", about = '" . pf_fix_slashes($_POST['about']) . "'"
            . ", pathname = '" . pf_fix_slashes($_POST['pathname']) . "'"
            . " WHERE id =" . $_SESSION['SESS_PROJECTID'] . ";";
    mysql_query($updsql);
    echo "<h1>Updated</h1>";
    echo "Project settings have been updated.";
}
else {
?>
<h1>Project Information</h1>
<form action="<?php echo $SCRIPT_NAME; ?>?func=general"
      method="POST">
    <table>
        <tr>
            <td>Project Name</td>
            <td><input type="text" name="name" value="<?php echo
                $row['name'] ?>"></td>
        </tr>
        <tr>
            <td>Path Name</td>
            <td><input type="text" name="pathname" value="<?php echo
                $row['pathname'] ?>"></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name="about" rows="10" cols="50"><?php echo
                    $row['about'] ?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Modify
details"></td>
        </tr>
    </table>
</form>
<?php
}
?>
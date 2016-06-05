<?php
include('database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>IPTABLES</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

 <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="../" class="navbar-brand">IPTABLES</a>
        </div>
      </div>
    </div>


    <div class="container">

      <div class="page-header" id="banner">
        <div class="row">
          <div class="col-lg-8 col-md-7 col-sm-6">
            <h1>IPTables</h1>
            <p class="lead">IPTables Config Interface</p>
          </div>
          <div class="col-lg-4 col-md-5 col-sm-6">



          </div>
        </div>
      </div>

<?php
$result = $db->query("SELECT * FROM iptables");
?>

 <!-- Tables
      ================================================== -->
      <div class="bs-docs-section">

        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 id="tables">Rules</h1>
            </div>

            <div class="bs-component">
              <table class="table table-striped table-hover ">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Asugehender Port</th>
                    <th>IP und Port</th>
                    <th>Description</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php
foreach ($result as $row) {
    $id       = $row["id"];
    $port_out = $row["port_out"];
    $ip_port  = $row["ip_port"];
    $desc     = $row["desc"];
    
    echo "<tr>";
    echo '<td>' . $id . '</td>' . '<td>' . $port_out . '</td>' . '<td>' . $ip_port . '</td>' . '<td>' . $desc . '</td>' . '<td><a class="btn btn-danger" type="button" href=delete.php?id=' . $id . '>DELETE</a></td>';
    echo "</tr>";
}
?>
                </tbody>
              </table> 
            </div><!-- /example -->

            <form class="form-horizontal" action="add.php" method="post">
			  <fieldset>
			    <legend>Add</legend>
			    <div class="form-group">
			      <label for="inputEmail" class="col-lg-2 control-label">Ausgehender Port</label>
			      <div class="col-lg-10">
			        <input type="text" class="form-control" name="port_out" id="port_out" placeholder="port">
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="inputPassword" class="col-lg-2 control-label">IP und Port</label>
			      <div class="col-lg-10">
			        <input type="text" class="form-control" name="ip_port" id="ip_port" placeholder="ip:port">
			      </div>
			    </div>
          <div class="form-group">
            <label for="text" class="col-lg-2 control-label">Description</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="desc" id="desc" placeholder="Description">
            </div>
          </div>
			    <div class="form-group">
			      <div class="col-lg-10 col-lg-offset-2">
			        <button type="reset" class="btn btn-default">Cancel</button>
			        <button type="submit" class="btn btn-primary">Submit</button>
			      </div>
			    </div>
			  </fieldset>
			</form>
          </div>
        </div>
      </div>
      </div>
</body>
</html>
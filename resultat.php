<?php
    
    require_once ('conn.php');
    $req = "SELECT * FROM contact";
    $ps = $pdo -> prepare ($req);
    $ps -> execute();
?>

<html>
<head>
	<title>Services scolarité</title>
	<meta charset="utf-8">
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
	<?php ?>
    <div class="container col-md-6 col-xs-12">
    	<div class="panel panel-info spacer">
    	<div class="panel-heading">Liste des messages</div>
    	<div class="panel-body">
    		<table class="table table-striped">
    		<thead>
        		<tr>
        			<th>CODE</th><th>NOM</th><th>EMAIL</th><th>MESSAGE</th>
        		</tr>
    		</thead>
    		<tbody>
        		<?php while ($et=$ps->fetch()) {?>
                	<tr>
                		<td> <?php echo ($et ['id']) ?></td>
                		<td><?php echo ($et ['name']) ?></td>
                		<td><?php echo ($et ['email']) ?></td>
                		<td><?php echo ($et ['message']) ?></td>
                	</tr>
        		<?php }?>
    		</tbody>
    	</table>
    	</div>
    </div>
    
    
    </div>
</body>
</html>
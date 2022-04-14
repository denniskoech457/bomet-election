<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ELECTION 2022</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <script src="../assets/js/sweetalert.min.js"></script>
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
    <?php
        
        include 'nav.php';
    ?>
        <div class="wrapper">
            <div class="container">
                <div class="row">
               
                    <div class="span9">
                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                <?php
                                        // Include the database configuration file
                                        include 'dbcon.php';
                                        
                                        // Get records from the database
										$type = $_GET['type_id'];
                                        $query = $db->query("SELECT * FROM positions where election_id='$type' ");
                                        
                                        if($query->num_rows > 0) 
                                            while($elecresults = $query->fetch_assoc()){
                                                
                                        ?>
                                    <a href="results.php?position=<?php echo $elecresults['position']; ?>&type_id=<?php echo $type= $_GET['type_id']; ?>" class="btn-box big span4"><i class=" icon-random"></i>
                                        <p class="text-muted">
                                        <?php echo $elecresults['position']; ?></p>
                                    </a>
                                   
                                    <?php }
                                    else {
                                        echo "<h2 style='color:red;'> SORRY!! ASPIRANTS TO BE ADDED SOON</h2>";
                                    } ?>
                                </div>
                                
                            </div>
                            <!--/#btn-controls-->
                            
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2022 Election 2022 </b>All rights reserved.
            </div>
        </div>
        <?php if (isset($_SESSION['status']) && $_SESSION['status'] !='' )
        {
          ?>
          <script>
          
          swal({
          title: "<?php echo $_SESSION['status']  ; ?>",
          text: "<?php echo $_SESSION['more']  ; ?>",
          icon: "<?php echo $_SESSION['status_code']  ; ?>",
          button: "ok",
          });
        </script>
        <?php 
         unset($_SESSION['status']);
       }
      ?>
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
      
    </body>

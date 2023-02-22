<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>School Coordinator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="database_error.css" />
</head>

<!-- the body section -->
<body>
    <div class="container">
        <div class="row row-content">
            <div class="col-12">
                <div class="card">
                    <img src="./images/error5.jpg" class="card-img-top img-fluid" alt="error image">
                    <div class="card-body">
                        <h2 class="card-title text-center bg-success">ERROR !!!----ERR0R !!!</h2>
                        <!-- <h5>Database Error</h5> -->
                        <p>There was an error connecting to the database.</p>
                        <p>The database must be installed as described in the appendix.</p>
                        <p>Error message: <?php echo $error_message; ?></p>
                        <p>&nbsp;</p>
                        <p class="card-text text-center"><small class="text-muted">&copy; <?php echo date("Y"); ?> Fantasy Coordinator, Inc.</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
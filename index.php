<!DOCTYPE html>
<html lang="en">
    <head>
        <title>iContact Test Job(EgenieNext Web Solutions)</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style type="text/css">
            .panel{
                margin: 8% 0 0 0;
                height: 230px;
            }
            .panel .panel-body{
                padding: 50px 30px;
            }
            .input-group{
                width: 100%;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">IContact</h1>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-uppercase"><h3 class="text-center" style="margin: 0;">Import Contact </h3></div>
                        <div class="panel-body">
                            <label>Upload CVS File</label>
                            <form  class="form-inline" action="importContact.php" method="post" enctype="multipart/form-data">
                                <div class="input-group">
                                    <input class="form-control" type="file" name="csvFile" required=""/>
                                    <div class="input-group-btn">
                                      <button class="btn btn-info active btn-block" name="importContact" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form> 
                        </div>
                    </div> 
                </div>

                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-uppercase"><h3 class="text-center" style="margin: 0;">EXPORT CONTACT</h3></div>
                        <div class="panel-body">
                            <label>&nbsp;</label>
                            <form action="getContact.php" method="post">
                                <div class="text-center">
                                    <button name="contactGet" class="btn btn-block btn-info active">Download Contacts</button>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
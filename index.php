
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Advanced XAMPP Dashboard by sevenX">
    <meta name="author" content="sevenX - Rico Loschke">
    <link rel="icon" href="favicon.ico">

    <title>Webserver Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
  </head>

  <body>

    <nav class="navbar navbar-static-top navbar-dark bg-warning">
      <a class="navbar-brand" href="http://localhost/">Advanced XAMPP Dashboard</a>
      <ul class="nav navbar-nav push-right">
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/phpmyadmin" target="_blank">phpMyAdmin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="phpinfo.php" target="_blank">Infophp</a>
        </li>
      </ul>
    </nav>

    <div class="container">
      <hr>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-search"></i></span>
        <input class="form-control" id="livesearch" placeholder="Find a project" type="text" />
      </div>
      <table class="table table-striped" id="projects">
        <thead>
          <tr>
            <th>Project</th>
            <th>Repo</th>
            <th>Environment</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach (glob("C:/Webserver/htdocs/*/xampp.json") as $file) {
            $string = file_get_contents($file);
            $json = json_decode( $string, true );?>
          <tr>
            <td><strong><?=$json['name']?></strong><br><small><?=$json['desc']?></small></td>
            <td>
              <?php
              if(!empty($json['repo_url'])) {
                if (strpos($json['repo_url'], 'github') == true) { ?>
                    <a href="<?=$json['repo_url']?>" class="btn btn-secondary btn-sm" target="_blank">Github</a>
                <?php } else if (strpos($json['repo_url'], 'bitbucket') == true) { ?>
                    <a href="<?=$json['repo_url']?>" class="btn btn-primary btn-sm" target="_blank">Bitbucket</a>
                <?php }
              } ?>
            </td>
            <td>
                <?php if(!empty($json['localhost_url'])) { ?><a href="<?=$json['localhost_url']?>" class="btn btn-warning btn-sm" target="_blank"><i class="fa fa-eye"></i> Local</a><?php }?>
                <?php if(!empty($json['localhost_backend_url'])) { ?><a href="<?=$json['localhost_backend_url']?>" class="btn btn-warning btn-sm" target="_blank"><i class="fa fa-gear"></i> Backend</a><?php }?>
                <?php if(!empty($json['local_database_name'])) { ?><a href="http://localhost/phpmyadmin/db_structure.php?db=<?=$json['local_database_name']?>" class="btn btn-warning btn-sm" target="_blank"><i class="fa fa-database"></i> Database</a><?php }?>
                <?php if(!empty($json['stage_url'])) { ?><a href="<?=$json['stage_url']?>" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-eye"></i> Staging</a><?php }?>
                <?php if(!empty($json['live_site_url'])) { ?><a href="<?=$json['live_site_url']?>" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-eye"></i> Live</a><?php }?>
              <?php if(!empty($json['live_backend_url'])) { ?><a href="<?=$json['live_backend_url']?>" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-gear"></i> Live Login</a><?php }?>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      </div>

      <hr>

      <footer class="container">
        <p>Made with <i class="fa fa-heart"></i> by <a href="http://sevenx.de/ target="_blank">sevenX</p>
      </footer>
    </div>

    <a href="https://github.com/loschke/Advanced-XAMPP-Dashboard" target="_blank"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/38ef81f8aca64bb9a64448d0d70f1308ef5341ab/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f6461726b626c75655f3132313632312e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png"></a>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
    <script src="js/livesearch.min.js" type="text/javascript"></script>
    <script src="js/init.js" type="text/javascript"></script>

  </body>
</html>

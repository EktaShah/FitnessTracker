<html>
 <head>
        <meta charset="utf-8">

        <title>Fitness Tracker</title>
        <meta name="viewport" content="width=device-width; initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="content/css/main.css">
        
    </head>

    <body>
        <div id="top-nav"></div>
            <header>
                <div class="container">
                    <h1>Employee Table</h1>
                    
                </div>
            </header>

            <div class="container content">
                <? include __DIR__ . '/../inc/_global.php';
                
                $sql = "SELECT * FROM EMPLOYEE";
                $model = FetchAll($sql);
                
                ?>
                <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>FirstName</th>
                  <th>LastName</th>
                  <th>Age</th>
                  <th>Sex</th>
                  <th>Income</th>
                  </tr>
              </thead>
              <tbody>
                <? foreach ($model as $rs): ?>
                <tr>
                  <td><?=$rs['FIRST_NAME']?></td>
                  <td><?=$rs['LAST_NAME']?></td>
                  <td><?=$rs['AGE']?></td>
                  <td><?=$rs['SEX']?></td>
                  <td><?=$rs['INCOME']?></td>
                 
                  </tr>
                <? endforeach; ?>
              </tbody>
            </table>
          </div>

 </body>
     <!-- 
public static function Get()
    {
        $sql = "SELECT * FROM EMPLOYEE";
    }
    Get()
     -->
</html>
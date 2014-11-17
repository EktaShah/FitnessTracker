            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
            <link rel="stylesheet" href="http://cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.css">

            <header>
            <h2><i>Food Log</i></h2>
            </header>
            <div class="container content">
                <a class="btn btn-success" data-toggle="modal" data-target="#myModal" href="FoodLogForm.php"> <i class="glyphicon glyphicon-plus"></i>Add</a>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" >
                    <div class="modal-dialog">
                        <div class="modal-content"></div>
                    </div>
                </div>
                <br />
                <br />
                <table id="example" class="table table-striped table-bordered" >
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Calories</th>
                            <th>Fat(g)</th>
                            <th>Carbs(g)</th>
                            <th>Protein(g)</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? foreach ($model as $rs): ?>                          
                        <tr>
                            <td><?=$rs['Name']?></td>
                            <td><?=$rs['Calories']?></td>
                            <td><?=$rs['Fat']?></td>
                            <td><?=$rs['Carbs']?></td>
                            <td><?=$rs['Protein']?></td>
                            <td><?=$rs['Time']?></td>
                        <td>
                            <a title="Edit" class="btn btn-default btn-sm toggle-modal" data-target="#myModal" href="?action=edit&id=<?=$rs['id']?>">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                        </td>
                        </tr>
                        <? endforeach; ?>
                    </tbody>
                </table>

            </div>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.4.0/holder.js"></script>

            <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>
            <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.1/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="http://cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js"></script>

            <script type='text/javascript'>
                $(window).load(function() {
                    $(".FTFoodLog").addClass("active");
                    $("#top-nav").load("inc/navigation.php", function() {
                        $(".index").addClass("active");
                    });
                    $(document).ready(function() {
                        $('#example').dataTable();
                    });
                });
            </script>
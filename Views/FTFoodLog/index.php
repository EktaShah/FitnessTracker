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
                            <th>Protien(g)</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pizza</td>
                            <td>500</td>
                            <td>18.0</td>
                            <td>5.0</td>
                            <td>3.0</td>
                            <td> Sunday 9:15am</td>
                        </tr>
                        <tr>
                            <td>Yogurt</td>
                            <td>80</td>
                            <td>0.5</td>
                            <td>0.0</td>
                            <td>3.0</td>
                            <td> Sunday 10:15am</td>
                        </tr>
                        <tr>
                            <td>CerealBar</td>
                            <td>100</td>
                            <td>2.0</td>
                            <td>5.0</td>
                            <td>3.0</td>
                            <td> Sunday 11:15am</td>
                        </tr>
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

                    $("#top-nav").load("inc/navigation.php", function() {
                        $(".index").addClass("active");
                    });
                    $(document).ready(function() {
                        $('#example').dataTable();
                    });
                });
            </script>
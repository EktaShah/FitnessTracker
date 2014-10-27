<header>
	<h2><i>Food Log</i></h2>
	</div>
</header>
<div class="container content">
	<a class="btn btn-success" data-toggle="modal" data-target="#myModal" href="?action=edit&format=plain"> <i class="glyphicon glyphicon-plus"></i>Add</a>
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
                <? foreach ($model as $rs): ?>
                <tr>
                  <td><?=$rs['Name']?></td>
                  <td><?=$rs['Calories']?></td>
                  <td><?=$rs['Fat']?></td>
                  <td><?=$rs['Carbs']?></td>
                  <td><?=$rs['Protien']?></td>
                  <td><?=$rs['Time']?></td>
                </tr>
                <? endforeach; ?>
              </tbody>
          </table>
		</table>
          </div>

            </div>

        <script type="text/javascript">
            $(function(){
                $(".FTFoodLog").addClass("active");                  
                $('#myModal').on('hidden.bs.modal', function (e) {
                  $("#myAlert").show();
                })
            });
        </script>
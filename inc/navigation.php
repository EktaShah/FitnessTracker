<div class="navbar navbar-inverse navbar-fixed-top" role="navigation" ng-controller='facebook'>
	<div class="container">
        <!--<base href="~/">-->

		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">

			</button>
			<a class="navbar-brand" href="{{loc}}index.php"><i class="glyphicon glyphicon-signal"></i>   FitnessTracker</a>
		</div>
		<div class="collapse navbar-collapse">

			<ul class="nav navbar-nav">
				<!-- <li class="active">
					<a href="index.php">Home</a>
				</li> -->
				<li class="food"><a href="{{loc}}Controllers/FTFoodLog.php">Food Log</a></li>   
				<li class="exercise"><a href="{{loc}}Controllers/FTExerciseLog.php">Exercise Log</a></li>
				<li>
					<a href="#">BMI Calculator</a>
				</li>
				<li>
					<a href="#">Goal Tracking</a>
				</li>
				<li>
					<a href="#">Make a Group</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
                <li class="SignIn">
                    <a ng-click="login()"><i class="glyphicon glyphicon-user"></i> Sign In</a>
                </li>
                <li class="SignOut">
                    <a ng-click="logout()" style="padding-top: 0px; padding-bottom: 0px;"><img id="profile"></img> Sign Out</a>
                </li>
            </ul>
		</div><!--/.nav-collapse -->
	</div>
</div>

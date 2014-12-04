
        <link href="Content/css/main.css" rel="stylesheet">
        <div id="top-nav" ng-include="'inc/navigation.php'"></div>   
        <!-- Main Initialization Code -->
        <script src="Content/js/FitnessTracker.js" type="text/javascript"></script>    
        <div class="container">
            <br>
            <br>

            <div class="starter-template">

                <h1><i>FitnessTracker</i></h1>
                <p class="lead">
                    Track life, food and the pursuit of happiness!
                </p>
            </div>

            <p align="left">

                <br>
                <a href="ftsignIn.php" class="btn btn-default" role="button">Login</a>
                <!-- <button type="button" class="btn btn-default" href="ftsignIn.php" >
                    Login
                </button> -->
                <br>

                <button type="button" class="btn btn-default" href = "#">
                    FaceBook Signup
                </button>
                <br>
                <button type="button" class="btn btn-default" href = "#">
                    Google+ Signup
                </button>

            </p>

        </div><!-- /.container -->

        <!-- Stretches the background image as per screen size -->
        <!-- add the backstretch plugin -->
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js"></script>

        <script type='text/javascript'>
            $(window).load(function() {
                $.backstretch("http://www.burn60.com/blog/wp-content/uploads/2013/12/morning-workout.jpg");
                // $("#top-nav").load("inc/navigation.php", function() {
                    // $(".index").addClass("active");
                // });
            });
        </script>
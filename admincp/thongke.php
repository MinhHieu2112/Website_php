
<?php
    require('../Carbon/autoload.php'); 

    use Carbon\Carbon; // Import the Carbon class
    use Carbon\CarbonInterval; // Import the CarbonInterval class

    printf("Now: %s", Carbon::now()); // Print the current date and time using Carbon

    printf("1 day: %s", CarbonInterval::day()->forHumans()); // Print "1 day" using CarbonInterval
?>

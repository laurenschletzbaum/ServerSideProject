<!--This page is going to contain the header and footer with the list of workouts for the user to choose-->
<!DOCTYPE html>
<html>
<head>
    <title>Max Lift</title>
    <style>
        body {
            background-color: whitesmoke; 
            color: purple; 
        }
        .container {
            margin: 20px auto;
            width: 80%;
        }
        select {
            width: 200px;
            padding: 5px;
            border-radius: 5px;
            margin-bottom: 10px;
            color: olive; 
        }
        canvas {
            background-color: #fff;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Lift Statistics</h2>
    <form method="post" action="">
        <label for="Lift">Select A Lift:</label>
        <select name="lift" id="Lift">
            <option value="">Select a lift</option>
            <option value="Back Squat">Back Squat</option>
            <option value="Bench Press">Bench Press</option>
            <option value="Clean and Jerk">Clean and Jerk</option>
            <option value="Deadlift">Deadlift</option>
            <option value="Front Squat">Front Squat</option>
            <option value="Hang Clean">Hang Clean</option>
            <option value="Hang Power Snatch">Hang Power Snatch</option>
            <option value="Pause Back Squat">Pause Back Squat</option>
            <option value="Power Clean">Power Clean</option>
            <option value="Power Snatch">Power Snatch</option>
            <option value="Push Jerk">Push Jerk</option>
            <option value="Squat Clean">Squat Clean</option>
            <option value="Squat Snatch">Squat Snatch</option>
            <option value="Thruster">Thruster</option>
        </select>
        <input type="submit" value="Submit">
    </form>
</div>
            <?php
            // Connect to database
            $connection = mysqli_connect("localhost", "root", "", "gym");

            // Check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            // Fetch lift names from the lifts table
            $result = $connection->query("SHOW TABLES LIKE '%Lift'");
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $liftName = str_replace('Lift', '', $row['Tables_in_gym']);
                    echo "<option value='$liftName'>$liftName</option>";
                }
            }
            ?>

        </select>
        <input type="submit" value="Submit">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['lift'])) {
            $lift = $_POST['lift'];


            // Fetch max weight and dates for the selected lift
            $sql = "SELECT MAX(Weight) AS max_weight, date FROM $lift GROUP BY date";
            $result = $connection->query($sql);
            $dates = array();
            $weights = array();
            while ($row = $result->fetch_assoc()) {
                $dates[] = $row['date'];
                $weights[] = $row['max_weight'];
            }


            // Display max weight and graph
            if (!empty($dates)) {
                echo "<h3>Max Weight for $lift</h3>";
                echo "<p>Max Weight: " . max($weights) . "</p>";
                echo "<canvas id='liftChart'></canvas>";
                echo "<script>
                        var ctx = document.getElementById('liftChart').getContext('2d');
                        var dates =$dates;
                        var weights =$weights;
                        var chart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: dates,
                                datasets: [{
                                    label: 'Max Weight',
                                    data: weights,
                                }]
                            }
                        });
                    </script>";
            } else {
                echo "<p>No data available for $lift</p>";
            }
        }
    }
    ?>
</div>
</body>
</html>
<!DOCTYPE html>
<html>
 
<head>
    <link rel="stylesheet" href="eventpage_1.css">
</head>
 
<body>
    <h1 class="Heading">Events and Newsroom</h1>
    
    <div class="layout">
        <h2>News</h2>
        <?php 
            require_once "connection.php";
            $result = mysqli_query($conn, "SELECT * FROM news");
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="accordion">
            <div class="accordion__question">
                <p ><?php echo $row['newsTitle']?> </p>
                <p >
                    <?php 
                        $newDate = date('d-M-Y', strtotime($row['newsDate']));
                        echo $newDate;
                
                    ?></p>
 
            </div>
            <div class="accordion__answer">
                <pre >Greetings of the Day!

                    Hope everyone is doing good and fine.
                   <p> <?php echo $row['newsDescription']?> </p>

                    Regards
                    President, AAGEC</pre>
            </div>
        </div>

        <?php } ?>
    </div>


    <div class="layout">
        <h2>Events </h2>
        <?php 
            require_once "connection.php";
            $result = mysqli_query($conn, "SELECT * FROM events");
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="accordion">
            <div class="accordion__question">
                <p ><?php echo $row['eventTitle']?> </p>
                <p >
                    <?php 
                        $newDate = date('d-M-Y', strtotime($row['eventDate']));
                        echo $newDate;
                
                    ?></p>
 
            </div>
            <div class="accordion__answer">
                <pre >Greetings of the Day!

                    Hope everyone is doing good and fine.<p> <?php echo $row['eventDescription']?> </p> <p> <?php echo $row['extraInfo']?> </p>
                    Regards
                    
                    President, AAGEC</pre>
            </div>
        </div>

        <?php } ?>
    </div>
    <script>
        let answers = document.querySelectorAll(".accordion");
        answers.forEach((event) => {
	        event.addEventListener("click", () => {
		        if (event.classList.contains("active")) {
			        event.classList.remove("active");
		        } else {
			        event.classList.add("active");
		    }
	    });
    });
    </script>
</body>
 
</html>
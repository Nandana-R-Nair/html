<html>
    <head>
    <title>Registration Page</title>
    </head>
    <body>
        <div id="form">
            <form name="form ">
                <label> USERNAME </label>
                <input type="text"><br>
                <label>password</label>
                <input type="password">
                <input type="submit">
            </form>
            <?php
            $conn=mysqli_connect('localhost','root','','form');
            if(!$conn){
                die("connection failed:".mysqli_connect_error());
            }
            else{
               
                    echo"connected successfully";
                   
                }
            ?>
        </div>
    </body>
</html>

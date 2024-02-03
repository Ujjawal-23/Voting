<?php
        session_start();
        include('../api/connect.php');
        if(!isset($_SESSION['userdata'])){
            header("location: ../");
        }

        $userdata = $_SESSION['userdata'];
        $groupsdata = $_SESSION['groupsdata'];

        if($_SESSION['userdata']['status'] == 0){
            $status = "<b style='color:red;'> Not Voted </b>";
        }else{
            $status = "<b style='color:green;'> Voted </b>";

        }

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Dashboard</title>
        <style>
            h1{
            color: rgb(24, 98, 47);
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            text-shadow: 1px 1px black;
                
            }
            p{
                text-align: left;
                margin-top: 10px;
                margin-left: 40px;
                margin-bottom: 10px;
            }

            body{
                text-align: center;
                font-size: large;
                background-color: lightcoral;
            }
            button{
                padding: 5px;
                font-size: 15px;
                background-color: blue;
                color: white;
                border-radius: 5px;
            } 
            #content{
                display: flex;
                flex-direction: row;
            }

            #profile{
                display: flex;
                width: 30%;
                height: 350px;
                flex-direction: column;
                padding: 30px;
                padding-left: 50px;
                margin: 40px;
                background-color: rgb(221, 240, 240);
                box-shadow: 1px 1px 5px 1px;

                border: 3px solid crimson;
                border-radius: 15px;
            }
            #group{
                display: flex;
                width: 70%;
                height: 100%;
                flex-direction: column;
                text-align: left;
                padding: 30px;
                padding-left: 50px;
                margin: 40px;
                background-color: rgb(221, 240, 240);
                box-shadow: 1px 1px 5px 1px;
                border: 3px solid crimson;
                border-radius: 15px;
            }
            #votebtn{
                padding: 5px;
                margin-left: 50px;
                margin-top: 10px;
                font-size: 15px;
                background-color: green;
                color: white;
                border-radius: 5px;
            }
            #voted{
                padding: 5px;
                margin-left: 50px;
                margin-top: 10px;
                font-size: 15px;
                background-color: red;
                color: white;
                border-radius: 5px;
            }
            
            
        </style>
</head>
<body>

    <div>
        <div>
            <a href="../"><button style="float:left;padding:10px;" id="back">Back</button></a>
            <a href="logout.php"><button style="float:right; padding:10px;" id="logout">Logout</button></a>
            <h1>Online Student Voting System</h1>
        </div>
        
        <hr>
        <div id="content">
        <div id="profile" >
            <img src="../uploads/<?php echo $userdata['photo']?>" style="height:200px; width:70%; margin-left:40px;"  ><br>

            <p><b>Name : </b><?php echo $userdata['name']?></p>
            <p><b>Mobile : </b><?php echo $userdata['mobile']?></p>
            <p><b>Address : </b><?php echo $userdata['address']?></p>
            <p><b>Status : </b><?php echo "$status" ?></p>

        </div>
        <div id="group">
            <?php if($_SESSION['groupsdata']){
                for($i= 0 ; $i<count($groupsdata) ; $i++){
                // for($i= 0 ; $i<4 ; $i++){
                    ?>
                    <div>
                    <p>
                    <img src="../uploads/<?php echo $groupsdata[$i]['photo']?>" style=" float:right; height:200px; width:30%; " ><br>
                        <b>Group Name: </b><?php echo $groupsdata[$i]['name'] ?> <br>
                        <form action="../api/vote.php" method="POST">
                            <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                            <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                            <?php
                            if($_SESSION['userdata']['status'] == 0){
                                ?>
                                    <input type="submit" name="votebtn" value="Vote now" id="votebtn">
                                <?php
                            }else{
                                ?>
                                    <p><b>Votes: </b><?php echo $groupsdata[$i]['votes'] ?> <br></p>
                                    <button disabled type="button" name="votebtn" value="vote" id="voted">Voted</button>
                                <?php
                            }
                            ?>
                        </form>
                        
                    </p>
                    </div>
                    <b><br><hr></b>
                    <?php   
                }
            }  ?>

        </div>
        </div>
    </div>

    </body>
</html>
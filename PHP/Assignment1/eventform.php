<?php
  $event_id="";
  $event_title="";
  $event_desc= "";
  $event_date= "";
  $event_time= "";#Additional Element I created
  $event_cat= array("Workshop","Seminar","Social","Lab","Tutorial","Lecture");
  $register_type= ""; # ALT  $registration_type= "";
  $features= array("Catering","Certificate","Accessibility","WheelChair Accessible","Other");#Use case if Other for trigger
  $location=array("BA","EN","ATC","AMDC","AS","LB","TA","TD");#Research which buildings have each of the things, and ADD CRIT TO RESTRICT
  #Formerly Buildings
?>
 
 <DOCTYPE html>
    <head>
        <title>CampusConnect Event form page</title>
        <meta charset="utf-8">
        <meta name="description" content="EventForm Page">
        <meta name="keywords" content="HTML, CSS, PHP">
        <meta name="author" content="Joanne Davis">
        <!-- Styles and Links--->
         <link rel="stylesheet" href="Assets/css/styles.css">
         <link rel="icon" href="https://static.vecteezy.com/system/resources/previews/059/656/570/non_2x/fresh-bagel-breakfast-bread-on-transparent-background-free-png.png" type="image/png">
        <link href="https://jsdelivr.net" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>
    <body>
            <header><h1>Event Form</h1>
            <!--Nav bar--To be updated-->
            <nav>
                <a href="index.php">Index</a><!--Add CSS to be different colour as its active page-->
                <a href="eventform.php">Create Event</a><!--Add CSS to be different colour as its active page-->
                <a href="searchform.php">Search Event</a>
                <a href="about.php">About</a>
                <!---On all other pages The site that is missing replaces image
                So it checks what page it is ie this is index.php
                If index.php is in the list replace with the missing one,
                ETC FOR lall others 
                so that they do not have the option ot go back to the page they are currently on--->

            </nav>
        </header>
        <div class="" id="event_info"><!--Event_info--->
            <form action="eventprocess.php" method="post">



            </form>
        </div>

    </body>
    


</DOCTYPE>


<!----Notes

Active Nav bar page should be Highlighted and underlined


-->
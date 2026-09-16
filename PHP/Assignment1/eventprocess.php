<?php
 #idea
##$input,'ID',5,'E[0-9]{4}'
    #Default Holders
   #Receive and trim values of html attribute

$event_id=trim($_POST['eventID'] ?? '');
$event_title=trim($_POST['eventTitle'] ?? '');
$event_desc=trim($_POST['eventDesc'] ?? '');
$event_date=trim($_POST['eventID'] ?? '');

$event_cat=$_POST['eventTitle'] ??'';
$register_type= $_POST['eventTitle'] ??'';
$features=$_POST['eventTitle'] ??'';
$location=$_POST['eventTitle'] ??'';
$errors=[];
 function check_input($input,$title,$char_length=60,$pattern){
    $input = trim($input);
    #Check if empty
    if ($input== ''){
        $errors[] = "Event $title cannot be Empty.";
      }
    #Check String Length, Although we have that set to not possible,
    elseif (strlen($input) > $char_length) {
          $errors[] = "Event $title Cannot Exceed $char_length Characters.";
          }
    elseif (!preg_match('/$pattern/', $input)) 
        {#If Input does not match Pattern
             $errors[] = "Event $title has an invalid format.
             It must use the correct format and contain no more than $char_length characters.";
          }

    }



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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" >
    </head>
    </head>
    <body>
            <header>
            <h1>Event Processing</h1>
            <!--Nav bar--To be updated-->
            <nav class="navbar navbar-expand-lg bg-light justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Index</a><!--Add CSS to be different colour as its active page-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="eventform.php">Create Event</a><!--Add CSS to be different colour as its active page-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="searchform.php">Search Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                </ul>
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
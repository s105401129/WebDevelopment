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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" >
    </head>
    <body>
            <header><h1>Event Form</h1>
            <!--Nav bar--To be updated-->
            <nav class="navbar navbar-expand-lg bg-light justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Index</a><!--Add CSS to be different colour as its active page-->
                    </li>

                <li class="nav-item">
                    <a class="nav-link active" href="#">Create Event</a><!--Add CSS to be different colour as its active page-->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="searchform.php">Search Event</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a></li>

                <!---On all other pages The site that is missing replaces image
                So it checks what page it is ie this is index.php
                If index.php is in the list replace with the missing one,
                ETC FOR lall others 
                so that they do not have the option ot go back to the page they are currently on--->
</ul>
            </nav>
        </header>
        <div class="" id="event_info"><!-- Event_info--->
            <form action="eventprocess.php" method="post">
                <div class="event_info">
                       
                        <div class="event_identifiers"> <!-- Event Identifiers -->
                            <label for id="eventID">
                                Event ID
                            </label>
                            <input type="text" id="eventID" name="eventID"> <!--Add reference to checker agaisnt database for current active ids-->
                                <!-- Event ID, E followed by 4 DIGITS, Add a EventElement for when 9999 events exist,  
                                 AutoGenerates is standard but assignment says Allow them to choose,
                                    MUST MAKE IT CHECK THAT Event ID DOES NOT ALREADY EXIST!!!!
                                    Add Autogenertae button anyway 


                                 Realistically 9999 events are not going to exist at the same time, 
                                 If the company wants the ability to rollback updates and stores a copy of all past events, 
                                 This is crucial
                                    Maybe It changes the letter before it to a different letter,
                                    or stores as
                                    EE, Instead of EE,
                                    and a infinite Loop of E-afacation
                                    That way the fallback will have less trouble rather then having to do a whole system design later
                                 -->
                                <!-- Event Title, A title-->
                        </div>
                        <!-- Event Description, What its About, Whats involved, Max 260 char -->
                        <!-- Event Date, The date of the event-->
                        <!-- Event Time, The Time of the event-->
                        <!-- -->
                        <!-- -->

                </div>




            </form>
        </div>

    </body>
    


</DOCTYPE>


<!----Notes

Active Nav bar page should be Highlighted and underlined


Future Implementations or updates
Ticket register page,

Could be interesting to tinker with a capacity  Event
Have the capacitys for each event listed and tickets,
How that would work and function etc


-->
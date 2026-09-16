<?php
  $event_id=$_POST['eventID'];
  $event_title=$_POST['eventTitle'];
  $event_desc= "";
  $event_date= "";
  $event_cat= array("Workshop","Seminar","Social","Lab","Tutorial","Lecture");
  $register_type= array("Free","Paid"); # ALT  $registration_type= "";
  $features= array("Catering","Certificate","Accessibility","WheelChair Accessible","Other");#Use case if Other for trigger
  $location=array("BA","EN","ATC","AMDC","AS","LB","TA","TD");#Research which buildings have each of the things, and ADD CRIT TO RESTRICT
  #Formerly Buildings

  function array_to_radio($element_id,$array,$is_radio){
    #For each item in array create a radio element
        if ($is_radio){
            $type='radio';
            $value=$array;
        }
    else{
        $type= 'checkbox';}

    foreach($array as $item){
        echo "<label for='$item' class='form-check-label'>$item</label>";
        echo "<input name=$element_id type=$type value=$item id =$item class='form-check-input'> ";
    }}
    


  #experiment
  #Case requires must start with E,
 
  
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
                       <!--Add reference to checker agaisnt database for current active events, ie ONLY ID,alt scenario, 2 events exist with same name different ID-->
                        <div class="event_identifiers"> <!-- Event Identifiers -->
                            <label for ="eventID" class="form-label">Event ID</label>
                            <input type="text" id="eventID" name="eventID" maxlength="5" minlength="5" class="form-control"> <!--Add reference to checker agaisnt database for current active ids-->
                                <!-- Event ID, E followed by 4 DIGITS, Add a EventElement for when 9999 events exist,  
                                 AutoGenerates is standard but assignment says Allow them to choose,
                                    MUST MAKE IT CHECK THAT Event ID DOES NOT ALREADY EXIST!!!!
                                 Realistically 9999 events are not going to exist at the same time, 
                                 If the company wants the ability to rollback updates and stores a copy of all past events, 
                                    Maybe It changes the letter before it to a different letter,
                                    or stores as EE, Instead of EE,
                                    and a infinite Loop of E-afacation
                                    That way the fallback will have less trouble rather then having to do a whole system design later
                                 -->
                            <label for ="eventTitle" class="form-label">Event Title</label>
                                <input type="text" id="eventTitle" name="eventTitle" class="form-control"> 
                                <!-- Event Title, A title-->
                        </div>
                        <div class="form-group" id="event_info">
                            <label for ="eventDesc" class="form-label">Description</label><!-- Event Description, What its About, Whats involved, Max 260 char -->
                                <textarea id="eventDesc" name="eventDesc" maxlength="240" class="form-control"> </textarea>
                            <label for ="eventDate" class="form-label">Date</label><!-- Event Date, The date of the event-->
                                <input type="datetime-local" id="eventDate" name="eventDate" class="form-control"> 
                            <!-- Event Date, The date of the event-->
                            <span for="eventDate" class="form-label">Category</span>
                                <?php array_to_radio('eventDate',$event_cat,true); ?> <!--Create the Radios for Event Category-->
                            <!-- Registration Type -->
                            <span for ="regType" class="form-label">Registration Type</span>
                                <?php array_to_radio('regType',$register_type,true);?> <!--Create the Radios for Event Category-->
                            <!--Available Features -->
                            <span for ="features" class="form-label">Available Features </span>
                                <?php array_to_radio('features',$features,false);?> <!--Create the Radios for Event Category-->
                            <!--Location AKA which building-->
                            <span for ="building" class="form-label">Location </span>
                                <?php array_to_radio('building', $location, true);?> <!--Create the Radios for Event Category-->

                        </div>
                       
                       

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
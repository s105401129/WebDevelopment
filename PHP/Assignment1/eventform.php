<?php

$current_date = date('d/m/Y');
$event_category= array("Workshop","Seminar","Social");#,"Lab","Tutorial","Lecture");
$register_type= array("Free","Paid"); # ALT  $registration_type= "";
$all_features= array("Catering","Certificate","Accessibility");#Use case if Other for trigger
$locations=array("BA","EN","ATC","AMDC","AS","LB","TA","TD");#Research which buildings have each of the things, and ADD CRIT TO RESTRICT
  #Formerly Buildings



  function array_to_radio($element_id,$array,$type){
    #For each item in array create a radio element
    foreach($array as $item){
        if ($type!= "option"){
            echo "<label for=$item class='form-check-label'>$item</label>";
            

           echo "<input name=$element_id type=$type value=$item id=$item class='form-check-input' > ";}
        
        else{
            echo "<option value=$item>$item</option>";
        }
    }}
    
  


  #experiment
  #Case requires must start with E,
   



 #Input pattern to check against and it does

  
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
    <body>
            <header><h1>Event Form</h1>
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
                    <a class="nav-link" href="about.php">About</a></li>

                <!---On all other pages The site that is missing replaces image
                So it checks what page it is ie this is index.php
                If index.php is in the list replace with the missing one,
                ETC FOR lall others 
                so that they do not have the option ot go back to the page they are currently on--->
</ul>
            </nav>
        </header>
        <div class="container my-4" ><!-- Event_info--->
            <form action="eventprocess.php" method="post">
            <div class="row g-4">
                       <!--Add reference to checker agaisnt database for current active events, ie ONLY ID,alt scenario, 2 events exist with same name different ID-->
                <div class="col-md-6"> <!-- Event Identifiers -->
                            <label for ="eventID" class="form-label">Event ID</label>
                                 
                            <input type="text" id="eventID" name="eventID" maxlength="5" minlength="5"  pattern="[eE[0-9]{4}" class="form-control" placeholder="E0001" required> <!--Add reference to checker agaisnt database for current active ids-->
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
                            <input type="text" id="eventTitle" name="eventTitle" class="form-control" maxlength="60" pattern="[A-Za-z0-9 :,.'!\-]+" required>

                                <!---https://www.w3schools.com/TAgs/att_input_pattern.asp-->
                                <!-- Event Title, A title-->
                    </div>
                <div class="col-md-6">
                    <div class="form-group" >
                              <!-- Event Description, -->
                            <label for ="eventDesc" class="form-label">Description</label><!-- Event Description, What its About, Whats involved, Max 260 char -->
                                <textarea id="eventDesc" name="eventDesc" maxlength="240" class="form-control"required> </textarea>
                             <!-- Event Date, The date of the event-->
                        </div>
        </div> 
    </div> 
    </div>
        
        <div class="container my-4" ><!-- Event_info--->  
            <div class="row g-4">
                <div class="col-md-6">        
                                <!-- Event Category-->
                            <span  class="form-label">Category</span>
                                <?php array_to_radio('eventCategory',$event_category,'radio'); ?> <!--Create the Radios for Event Category-->
                            <!-- Registration Type -->
                            <span  class="form-label">Registration Type</span>
                                <?php array_to_radio('registrationType',$register_type,'radio');?> <!--Create the Radios for Event Category-->
                            <!--Available Features -->
                            <span  class="form-label">Available Features </span>
                                <?php array_to_radio('features',$all_features,'checkbox');?> <!--Create the Radios for Event Category-->
                            <!--Easier to just hardcode Other-->
                            <!---Refer to AI use for Error checking mismatch with trying to add a hidden section without Javascript,-->
                            <label for="otherSelected" class="form-check-label">Other</label>
                                <input name="other" type="checkbox" id="otherSelected" class="form-check-input" >
                                <div class="otherFeatureInput">
                                    <label for="otherFeature" class="form-label">Describe Other Feature</label>
                                    <input type="text" name="otherFeature" id="otherFeature" class="form-control" maxlength="60" ><!--Personally 60 seems reasonable-->
                                </div>
                    
            </div>
           
         <div class="col-md-6">
                    <label for ="eventDate" class="form-label">Date</label><!-- Event Date, The date of the event-->
                        <input type="text" id="eventDate" 
                                name="eventDate" value="<?php echo $current_date?>"pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}*"
                                placeholder="<?php $current_date?>" class="form-control"required> 
                            
            <!---{2} means exactly 2 digits ,[0-9]{2} 2 digit day
            Need to add restrictions, IE 
            ACCOUNT FOR LEAP YEAR,DIFFERNET NUMBER DAYS OF MONTHSSHE WILL TRY 200ADYou cannot account for the year after 9999
            -->         <!--Location AKA which building-->
                            <label for="location" class="form-label">Location </span>
                            <select id="location" name="location" class="form-select"required>
                                <option value="">---</option>
                                <!--
                                
                                
                                Note
        
                                MAKE SURE TO HANDLE THE DEFAULT NULL case
                                --->
                              
                                <?php array_to_radio('location', $locations, 'option');?> <!--Create the Radios for Event Category-->
                            </select>
                        </div>
                       <button type="reset" value="Reset" class="btn btn-primary">Reset Form</button>
                       <button type="submit" value="Submit" class="btn btn-secondary">Submit Form</button>
                       

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


TEH SELECT AND RADIO ISSUE NEED TO ADD CVRIT AT EL;AST ONE MSUT BE TRIGEGRED

-->
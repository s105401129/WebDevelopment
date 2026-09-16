<?php
 #idea
##$input,'ID',5,'E[0-9]{4}'
    #Default Holders
  #--------------------------------------JO HERE WAS AI
  #Asked AI HOW TO VISUALISE THE SUBMISSION OF A POST INSTANCE VIA ECHO STATEMENTS
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
  #--------------------------------------JO END OF AI HELP


$errors=array();#WHERE ALL Validatione rrors will be stored
$event_saved=false;#Indicator wether the event was succesfully stored


/* Safely display text in HTML */
function safe_output($input)
{
return htmlspecialchars($input,ENT_QUOTES,"UTF-8");
}

/* Clean text before validation and storage */
#Trim text and Replace tab/newLine with spaces to prevent user input from breaking file later
function clean_input($input) {
    if (!is_string($input)){
        return ""; #case for empty
    }
    $input=trim($input); #Trim Trailing 
    return str_replace(["\t", "\r", "\n"], " ", $input);
    /*
    \t means tab
    \r means a carriage return --Princess and Pauper 
    \n means a new line
    */
    
}

#Faster then hardCoding each
$variables=array("eventID","eventTitle","eventDesc","eventCategory","registrationType",
"features","eventDate","location");

$cleaned_inputs = array();#
foreach ($variables as $variable) {
    $cleaned_inputs[$variable] = clean_input($_POST[$variable] ?? "");
    /*
    variable contains the field name ------------> eventID
    $_POST[$variable] gets the submitted variable
    ?? "" uses a empty string if the field was not submitted
    clean_input() trims and cleans the submitted value
    $cleaned_inputs[$variable] stores the cleaned result

    */
}

#Convert cleaned array values into regular variables
$event_id = $cleaned_inputs["eventID"];
#VITAL for Sever right now, this solves lower case issue
$event_id = strtoupper($event_id);
$event_title = $cleaned_inputs["eventTitle"];
$event_desc = $cleaned_inputs["eventDesc"];
$event_date = $cleaned_inputs["eventDate"];
$event_category = $cleaned_inputs["eventCategory"];
$registration_type = $cleaned_inputs["registrationType"];
$location = $cleaned_inputs["location"];

#Validate Event ID
check_input($event_id,"ID",5,"/^E[0-9]{4}$/",$errors);
#Validate Event Title
check_input($event_title,"Title",60,"/^[A-Za-z0-9 :,.'!\-]+$/",$errors);
#Validate Event Desc
check_input($event_title,"Description",260,"",$errors);
#Validate Event Category 
$allowed_categories =  array("Workshop","Seminar","Social");#,"Lab","Tutorial","Lecture");

if (!in_array($event_category,$allowed_categories,true))
    {
        $errors[] ="Please select a valid Event Category.";
    }
#Validate Registration Type
$allowed_registration_types = array("Free","Paid");
if (!in_array($registration_type,$allowed_registration_types,true))
    #in_array() searches an array
    #$registration_type is being checked---------------""
    #allowed_registration_types is the permitted list------Null is not in the list So error is triggered
    {
        $errors[] ="Please select a valid Registration Type.";
    }

#Validate Location
$allowed_locations=array("BA","EN","ATC","AMDC","AS","LB","TA","TD");
if (!in_array($location,$allowed_locations,true))
    {$errors[] ="Please select a valid campus Location.";}
#Had issues with reg triggering NULL and false,DO NOT CHANGE LOCATION IT WORKS NOW

    
$selected_features = array();

#Process Available checkboxes optional
$catering = isset($_POST["catering"])? "Catering": "";
    #In this Line
    #? "Catering" means if selected store "Catering"
    # : "" means if NOT selected store an empty string
    #The result is saved in $catering
$certificate = isset($_POST["certificate"])? "Certificate": "";
$accessibility = isset($_POST["accessibility"])? "Accessibility": "";

# Check each optional feature 
if (isset($_POST["catering"])) {
    $selected_features[] = "Catering";
}
if (isset($_POST["certificate"])) {
    $selected_features[] = "Certificate";
}
if (isset($_POST["accessibility"])) {
    $selected_features[] = "Accessibility";
}

#Process Other Feature
$other_selected = isset($_POST["otherSelected"]);

/* Validate Other Feature checkbox value */
if ($other_selected &&$_POST["otherSelected"] !== "Other Feature") {
    $errors[] = "The Other Feature selection is invalid.";
    $other_feature = clean_input($_POST["otherFeature"] ?? "");
    #Text is required only when Other Feature is selected, <--------Disregard old idea follow thru
    if ($other_selected && $other_feature === "") {
        /*
            $other_selected must be true
            && means AND
            $other_feature === "" is description empty
        WHY--->The code inside runs only when Other Feature is selected AND THE text box is empty.
        */
        $errors[] = "Other Feature must be described when selected.";
        }
    check_input($other_feature, "Other Feature", 60, "", $errors); #Only the function needs &$errors
}

/*
 Validate a required text input.
    $input = submitted value
    $title = field name used in error messages
    $char_length = maximum  length
    $pattern = optional regular expression
    $errors = main errors array, passed by reference
*/
function check_input($input,$title,$char_length,$pattern,&$errors){
    #&$errors is vital IT MODIFIYS THE ORIGINAL ERRORS ARRAY OUTSIDE THE FUNCTION
    $input = trim($input);
    #Check if empty
    if ($input== ''){
        $errors[] = "Event $title cannot be Empty.";
      }
    #Check String Length, Although we have that set using html, Incase they do hygienics 
    elseif (strlen($input) > $char_length) {
          $errors[] = "Event $title Cannot Exceed $char_length Characters.";
          }
    elseif (!empty($pattern) && !preg_match($pattern, $input))
        {#If Input does not match Pattern
             $errors[] = "Event $title has an invalid format.";
           # It must use the correct format and contain no more than $char_length characters.";
          }
    }

#Confirm that eventform.php has submitted request by POST
if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    $errors[] = "The event form must be submitted using Post.";}
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
        

    </body>

<?php if (!empty($errors)): #If the $errors array is NOT EMPTY display the below html
    ?>
    <h1>Submission Errors</h1>
    <ul>
        <?php 
        foreach ($errors as $error) {
        echo "<li class='list-item'>". htmlspecialchars($error, ENT_QUOTES, "UTF-8"). "</li>";
}
            ?>
    </ul>

    <button class="btn btn-primary"><a href="eventform.php">Return to Event Form</a></button>

<?php else: ?>
    <h1 class="success">Validation Passed</h1>
    <p>Event ID: <?php echo htmlspecialchars($event_id, ENT_QUOTES, "UTF-8"); ?></p>
    <p>Event Title: <?php echo htmlspecialchars($event_title, ENT_QUOTES, "UTF-8"); ?></p>
    <p>Event Description: <?php echo htmlspecialchars($event_desc, ENT_QUOTES, "UTF-8"); ?></p>
    <p>Event Category: <?php echo htmlspecialchars($event_category, ENT_QUOTES, "UTF-8"); ?></p>
    <p>Event Registration: <?php echo htmlspecialchars($registration_type, ENT_QUOTES, "UTF-8"); ?></p>
</p>
    <p>Event Date: <?php echo htmlspecialchars($event_date, ENT_QUOTES, "UTF-8"); ?></p>


<?php endif; ?>



    </div>


</body>
</html>










<!----Notes

Active Nav bar page should be Highlighted and underlined


-->
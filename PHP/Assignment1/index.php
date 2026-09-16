<?php
    $full_name="Joanne Davis"; # old           #student_name
    $user_id=105401129;#old           #student_id
    $user_type="student";
    $swinburne_email= "$user_id@$user_type.swin.edu.au";
    #MAYVBE ADD INT FOR IF TEACHER OR STUDENT BASE DON IF <div class="STUDENT"></div>
    #if student in string then limited view
    

?>
 
 <DOCTYPE html>
    <head>
        <title>CampusConnect Index Page</title>
        <meta charset="utf-8">
        <meta name="description" content="Index Page">
        <meta name="keywords" content="HTML, CSS,PHP">
        <meta name="author" content="Joanne Davis">
        <!-- Styles and Links--->
        <link rel="stylesheet" href="Assets/css/styles.css">
        <link rel="icon" href="https://static.vecteezy.com/system/resources/previews/059/656/570/non_2x/fresh-bagel-breakfast-bread-on-transparent-background-free-png.png" type="image/png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" >

    </head>
    <body>
            <header><h1>CampusConnect</h1>
            <!--Resources used
           https://getbootstrap.com/docs/5.0/components/navbar/
-->
             <!--Nav bar--To be updated-->
          <nav class="navbar navbar-expand-lg bg-light justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active bg-light" href="index.php">Index</a><!--Add CSS to be different colour as its active page-->
                    </li>

                <li class="nav-item">
                    <a class="nav-link" href="eventform.php">Create Event</a><!--Add CSS to be different colour as its active page-->
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
                  <main>
                    <!---Can we make this a seperate declartion insert??--->
                    <h2> Student Details</h2>
                    <p>Full Name: <?=$full_name?></p>
                    <p>Student ID: <?=$user_id?></p>
                    <p>Email: <?=$swinburne_email?></p>
                    <!---The short hand way of writing 
                          echo $variable     IS      < ?= $variable ?> -->
                    <p>I <b><?=$full_name?></b> declare that this assignment is my individual work. 
                    I have not worked collaboratively, nor have I copied from any other student's work or from any other source</p>

                </main>
  <div style="width: 100px; height: 100px; background-color: #eae497;"></div>



    </body>
    


</DOCTYPE>


<!----Notes

Active Nav bar page should be Highlighted and underlined

Store header Info as a seprerate php To avoid unnessary code rewrites

-->
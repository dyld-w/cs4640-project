<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Nijat Khanbabayev and Dylan Dellett-Wion">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, , shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <title>Schedule</title>
</head>
<body onload="setFocus();">
    <!-- calendar from these links https://clarle.github.io/yui3/yui/quick-start/ -->
    <!-- https://clarle.github.io/yui3/yui/docs/calendar/calendar-simple.html -->
    <script src="https://yui-s.yahooapis.com/3.17.2/build/yui/yui-min.js"></script>
    <style>
        .yui3-button {
            margin:10px 0px 10px 0px;
            color: #fff;
            background-color: #3476b7;
        }
        .error {
            color: red;
            font-style: italic;
        }
    </style>
    <?php include 'navbar.html'?>

    <main class="flex-shrink-0">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>Workout</h1>

                    <form name="mainform" >

                    <div class="form-group">
                        <label for="workout_title">Workout Title</label>

                        <span class="error" id="workout_error"></span>        
                        
                        <input type="text" id="workoutdesc" class="form-control" name="desc" autofocus />
                        
                    </div>
                    
                    <div class="form-group">
                        <label for="taskdesc">Workout Description</label>
                        <span class="error" id="taskdesc-note"></span>        

                        <input type="text" id="taskdesc" class="form-control" name="desc" autofocus />

                    </div>
                    
                    <div class="form-group">
                        <label for="duedate">Date</label>  
                        <input type="text" id="duedate" class="form-control" placeholder="Recommended format: yyyy/mm/dd" />  
                        <span class="error" id="duedate-note"></span>
                    </div>
                    
                    <div id="tag-buttons">
                        <h2>Tags</h2>
                        <h4>Intensity</h4>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioIntensity" id="Beginner" value="Beginner">
                            <label class="form-check-label" for="inlineRadio1">Beginner</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioIntensity" id="Intermediate" value="Intermediate">
                            <label class="form-check-label" for="inlineRadio2">Intermediate</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioIntensity" id="Advanced" value="Advanced">
                            <label class="form-check-label" for="inlineRadio3">Advanced</label>
                          </div>

                          <h4>Bogy Region</h4>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioRegion" id="UpperBody" value="UpperBody">
                            <label class="form-check-label" for="inlineRadio1">Upper Body</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioRegion" id="LowerBody" value="LowerBody">
                            <label class="form-check-label" for="inlineRadio2">Lower Body</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioRegion" id="Full" value="Full">
                            <label class="form-check-label" for="inlineRadio3">Full Body</label>
                          </div>

                          <h4>Goal</h4>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioGoal" id="LoseWeight" value="LoseWeight">
                            <label class="form-check-label" for="inlineRadio1">Lose Weight</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioGoal" id="GetStronger" value="GetStronger">
                            <label class="form-check-label" for="inlineRadio2">Get Stronger</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioGoal" id="GainMuscle" value="GainMuscle">
                            <label class="form-check-label" for="inlineRadio3">Gain Muscle</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioGoal" id="GetFaster" value="GetFaster">
                            <label class="form-check-label" for="inlineRadio2">Get Faster</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioGoal" id="Other" value="Other">
                            <label class="form-check-label" for="inlineRadio3">Other</label>
                          </div>
                    </div>     
                                
                    <input type="button" class="btn btn-light" id="add" value="Add Task" onclick="addRow()"/> 
                    </form>

                    <br/>

                    <div id="todo">
                    <table id="todoTable" class="table" >
                        <thead>   <!-- set table headers -->
                        <tr>
                            <th>Workout Title</th>
                            <th>Workout Description</th>
                            <th>Date</th>
                            <th>Tags</th>
                            <th>(Remove)</th>
                        </tr> 
                        </thead>
                        
                        <!-- JS will dynamically create add new row upon form submission -->
                        
                    </table> 
                    </div>
                </div>
                <div class="col">
                    <div id="demo" class="yui3-skin-sam yui3-g"> <!-- You need this skin class -->
        
                        <div id="leftcolumn" class="yui3-u">
                            <!-- Container for the calendar -->
                            <div id="mycalendar"></div>
                        </div>
                        <div id="rightcolumn" class="yui3-u">
                        <div id="links" style="padding-left:20px;">
                            <!-- The buttons are created simply by assigning the correct CSS class -->
                            <button id="togglePrevMonth" class="yui3-button">Toggle Previous Month's Dates</button><br>
                            <button id="toggleNextMonth" class="yui3-button">Toggle Next Month's Dates</button><br>
                            Selected date: <span id="selecteddate"></span>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- sticky footer from https://getbootstrap.com/docs/5.0/examples/sticky-footer/ -->
    <?php include 'footer.html' ?>
    
    <script type="text/javascript">
        function setFocus()
        {
           document.mainform.desc.focus();   // access element of document by name (element with name="desc" of form with name="mainform") and set focus on it
           document.getElementById("taskdesc").focus();   // access element of document with id="taskdesc" and set focus on it
           document.forms[0].elements[0].focus();  // access element of document by position (in case name and id are unavailable or unknown)
                                                      // (the first form --index 0-- of this document, the first element --index 0-- of this form)
                                                      
           // to access an element of DOM by name, the element must have name attribute in the opening tag
           // to access an element of DOM by id, the element must have id attribute in the opening tag
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="js/YUI-calendar.js"></script>
    <script src="js/schedule.js"></script>
    <script>
        var today = new Date();
        var d = String(today.getDate()).padStart(2, '0');
        var m = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var y = today.getFullYear();
        today = y + '/' + m + '/' + d;
        document.getElementById('duedate').value = today;
    </script>
</body>
</html>
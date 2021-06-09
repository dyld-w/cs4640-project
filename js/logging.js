// <!-- calendar from these links https://clarle.github.io/yui3/yui/quick-start/ -->
// <!-- https://clarle.github.io/yui3/yui/docs/calendar/calendar-simple.html -->
var super_date = "";
YUI().use('calendar', 'datatype-date', 'cssbutton',  function(Y) {
    
    // Create a new instance of calendar, placing it in
    // #mycalendar container, setting its width to 340px,
    // the flags for showing previous and next month's
    // dates in available empty cells to true, and setting
    // the date to today's date.
    var calendar = new Y.Calendar({
        contentBox: "#mycalendar",
        width:'340px',
        showPrevMonth: true,
        showNextMonth: true,
        date: new Date()}).render();

    // Get a reference to Y.DataType.Date
    var dtdate = Y.DataType.Date;

    // Listen to calendar's selectionChange event.
    calendar.on("selectionChange", function (ev) {

        // Get the date from the list of selected
        // dates returned with the event (since only
        // single selection is enabled by default,
        // we expect there to be only one date)
        var newDate = ev.newSelection[0];
        super_date = newDate;
        // Format the date and output it to a DOM
        // element.
        Y.one("#selecteddate").setHTML(dtdate.format(newDate));
        document.getElementById("duedate").value = dtdate.format(newDate);
      //   Y.one("#duedate").setHTML(dtdate.format(newDate));
    });


    // When the 'Show Previous Month' link is clicked,
    // modify the showPrevMonth property to show or hide
    // previous month's dates
    Y.one("#togglePrevMonth").on('click', function (ev) {
        ev.preventDefault();
        calendar.set('showPrevMonth', !(calendar.get("showPrevMonth")));
    });

    // When the 'Show Next Month' link is clicked,
    // modify the showNextMonth property to show or hide
    // next month's dates
    Y.one("#toggleNextMonth").on('click', function (ev) {
        ev.preventDefault();
        calendar.set('showNextMonth', !(calendar.get("showNextMonth")));
    });
});

document.getElementById("taskdesc").addEventListener("focus", validateWorkoutTitle);
document.getElementById("duedate").addEventListener("focus", validateTaskDesc);
function validateWorkoutTitle() 
{
   if (document.getElementById("workoutdesc").value === '')
   {
      document.getElementById("workoutdesc").focus();
      document.getElementById("workout_error").innerHTML = "Please enter workout title";
   }
   else 
    document.getElementById("workout_error").innerHTML = "";
}

function validateTaskDesc() 
{
   if (document.getElementById("taskdesc").value === '')
   {
      document.getElementById("taskdesc").focus();
      document.getElementById("taskdesc-note").innerHTML = "Please enter task description";
   }
   else 
    document.getElementById("taskdesc-note").innerHTML = "";
}


function addRow()
{	  
   var desc = document.getElementById("taskdesc").value;
   var due = document.getElementById("duedate").value;
   console.log(due);
   // var priority = document.getElementById("priority").value; 
   var tags = "";
   if(document.getElementById('Beginner').checked){
      tags += "Beginner, ";
   }
   if(document.getElementById('Intermediate').checked){
      tags += "Intermediate, ";
   }
   if(document.getElementById('Advanced').checked){
      tags += "Advanced, ";
   }
   if(document.getElementById('UpperBody').checked){
      tags += "UpperBody, ";
   }
   if(document.getElementById('LowerBody').checked){
      tags += "LowerBody, ";
   }
   if(document.getElementById('Full').checked){
      tags += "Full, ";
   }
   if(document.getElementById('LoseWeight').checked){
      tags += "LoseWeight ";
   }
   if(document.getElementById('GetStronger').checked){
      tags += "GetStronger ";
   }
   if(document.getElementById('GainMuscle').checked){
      tags += "GainMuscle ";
   }
   if(document.getElementById('GetFaster').checked){
      tags += "GetFaster ";
   }
   if(document.getElementById('Other').checked){
      tags += "Other ";
   }
   var title = document.getElementById('workoutdesc').value;
   var removeoption = "<input type=button value=' X ' onClick='delRow()'>";
    
   if (desc === '')    // check if appropriate data are entered
   {
      document.getElementById("taskdesc").focus();
      document.getElementById("taskdesc-note").innerHTML = "Please enter task description";
   } 
   else
   {
    document.getElementById("taskdesc-note").innerHTML = ""; 
    
      if (due === '' || isNaN((new Date(due)).valueOf()))
      {      
         // if (due === '' || isNaN((new Date(due)).valueOf())) 
         // {
         //    document.getElementById("duedate").focus();
         //    document.getElementById("duedate-note").innerHTML = 
         //          "Date must be in <code>mm/dd/yyyy</code> or <code>mm/dd/yy</code> format and " + 
         //       "month and date must be in appropriate ranges";
         // }  
      }
      else
      {
         document.getElementById("duedate-note").innerHTML = "";
    
         // put all pieces of data in an array for later used to create cell content of a row 
         // var rowdata = [title, desc, due, priority, removeoption];
         var rowdata = [title, desc, due, tags, removeoption];
   
         // clear data entries (in the form)
         document.getElementById('workoutdesc').value = "";
         document.getElementById("taskdesc").value = "";
         document.getElementById("duedate").value = "";
         // document.getElementById("tag").selectedIndex = "0";   
         var tableRef = document.getElementById("todoTable");
   
         var newRow = tableRef.insertRow(tableRef.rows.length);    
         newRow.onmouseover = function() { 

            tableRef.clickedRowIndex = this.rowIndex;     
         };    
        
         var newCell = "";       
         var i = 0;
            
         while (i < 5)
         {
            newCell = newRow.insertCell(i);
            newCell.innerHTML = rowdata[i];
            newCell.onmouseover = this.rowIndex;
            i++;
         }
      }
   }
}  

// function addRow()
// {
//    console.log("peen");
//    if (document.getElementById("taskdesc").value == '')
//    {
//       document.getElementById("taskdesc").focus();
//       document.getElementById("taskdesc-note").innerHTML = "Please enter task description";
//    }
//    else 
//     document.getElementById("taskdesc-note").innerHTML = "";
// }
function delRow()
{
   // since deletion action is unrecoverable, add hesitation to minimize/avoid user error 
 if (confirm("Press OK to delete. This action is unrecoverable.") == true)   
      document.getElementById("todoTable").deleteRow(document.getElementById("todoTable").clickedRowIndex);
}
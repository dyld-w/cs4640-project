var searchButton = document.getElementById('search-button');
var searchInput = document.getElementById('search-input');
searchButton.addEventListener('click', () => {
  var inputValue = searchInput.value;
  var searchResults = document.getElementById('search_result');
  searchResults.innerHTML = "<h3>Search results for '" + inputValue + "'</h3>";
});
var coll = document.getElementsByClassName("collapsible");
var i;
// below is for collapsing different workouts
for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
};
var search = document.getElementById("search-input");
search.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
    event.preventDefault();
    // Cancel the default action, if needed
    // Trigger the button element with a click
    document.getElementById("search-button").click();
  }
});
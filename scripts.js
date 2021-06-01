var searchButton = document.getElementById('search-button');
var searchInput = document.getElementById('search-input');
searchButton.addEventListener('click', () => {
  var inputValue = searchInput.value;
  var searchResults = document.getElementById('get_big_fast_result');
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
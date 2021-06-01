var pic1 = document.getElementById('search-button');
var searchInput = document.getElementById('search-input');
searchButton.addEventListener('click', () => {
  var inputValue = searchInput.value;
  var searchResults = document.getElementById('get_big_fast_result');
  searchResults.innerHTML = "<h3>Search results for '" + inputValue + "'</h3>";
});
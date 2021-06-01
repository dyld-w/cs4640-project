const searchButton = document.getElementById('search-button');
const searchInput = document.getElementById('search-input');
searchButton.addEventListener('click', () => {
  const inputValue = searchInput.value;
  var searchResults = document.getElementById('get_big_fast_result');
  searchResults = "<h3>Search results for " + inputValue + " .</h3>";
  // alert(inputValue);
});
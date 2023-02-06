<html>
  <head>
    <style>
    </style>
  </head>
  <body>
    <h1>Property Listings Search</h1>
    <form id="search-form">
      <label>Price min:</label>
      <input type="text" name="price_min" />
      <br />
      <label>Price max:</label>
      <input type="text" name="price_max" />
      <br />
      <label>Location:</label>
      <input type="text" name="location" />
      <br />
      <label>Availability:</label>
      <input type="text" name="availability" />
      <br />
      <label>Sq.Metres min:</label>
      <input type="text" name="sq_metres_min" />
      <br />
      <label>Sq.Metres max:</label>
      <input type="text" name="sq_metres_max" />
      <br />
      <label>Type:</label>
      <input type="text" name="type" />
      <br />
      <button type="submit">Search</button>
    </form>
    <br />
    <h2>Search Results</h2>
    <div id="search-results"></div>
  </body>
  <script>
    document.getElementById('search-form').addEventListener('submit', function(e) {
      e.preventDefault();
      const formData = new FormData(this);
      const params = new URLSearchParams(formData).toString();
      fetch(`/api/search?${params}`)
        .then(response => response.json())
        .then(data => {
          const searchResults = document.getElementById('search-results');
          searchResults.innerHTML = data.map(result => `
            <p>
              ${result.location}, ${result.availability}, ${result.price} EUR, 
              ${result.sq_metres} sq.m., ${result.type}
            </p>
          `).join(', ');
        });
    });
  </script>
</html>

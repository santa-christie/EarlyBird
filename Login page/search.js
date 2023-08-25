document.addEventListener("DOMContentLoaded", function () {
    const searchButton = document.getElementById("searchButton");
    const searchInput = document.getElementById("searchInput");
    const newsContainer = document.getElementById("newsContainer");
  
    const apiKey = "c9a0a130f49844e78381f85cbd6b2413"; // Replace with your actual API key
  
    // Function to display news articles
    function displayNews(articles) {
      newsContainer.innerHTML = "";
      articles.forEach(article => {
        const articleHTML = `
          <div class="article">
            <h2>${article.title}</h2>
            <p>${article.description}</p>
            <a href="${article.url}" target="_blank">Read more</a>
          </div>
        `;
        newsContainer.innerHTML += articleHTML;
      });
    }
  
    // Event listener for search button click
    searchButton.addEventListener("click", function () {
      const searchTerm = searchInput.value.trim();
      if (searchTerm === "") {
        alert("Please enter a search term.");
        return;
      }
  
      const apiUrl = `https://newsapi.org/v2/everything?q=${searchTerm}&apiKey=${apiKey}`;
  
      // Fetch news data from the API
      fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
          if (data.articles && data.articles.length > 0) {
            displayNews(data.articles);
          } else {
            newsContainer.innerHTML = "No articles found.";
          }
        })
        .catch(error => {
          console.error("Error fetching news data:", error);
          newsContainer.innerHTML = "An error occurred while fetching news data.";
        });
    });
  });
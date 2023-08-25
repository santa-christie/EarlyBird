<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"
		content="width=device-width,
				initial-scale=1.0">
	<title>Early Bird</title>
	<link rel="stylesheet"
		href="styles.css">
	<link rel="stylesheet"
		href="responsive.css">
		<script src="index.js"></script>
		<script src="search.js"></script>
		
		
</head>

<body>

	<header>

		<div class="logosec">
            <img src=
"Early Bird logo.png"
				class="icn menuicn"
				id="menuicn"
				alt="menu-icon">
			
			<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
				class="icn menuicn"
				id="menuicn"
				alt="menu-icon">
		</div>

		<div class="searchbar">
			<input type="text" id="searchInput" placeholder="Search">
			<div class="searchbtn" id="searchButton">
			  <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png" class="icn srchicn" alt="search-icon">
			</div>
		  </div>
		  

		<div class="message">
			<div class="circle"></div>
			<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/8.png" class="icn"
				alt="">
			<div class="dp">
			<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png"
					class="dpicn"
					alt="dp">
			</div>
		</div>

	</header>

	<div class="main-container">
		<div class="navcontainer">
			<nav class="nav">
				<div class="nav-upper-options">
					<div class="nav-option option1">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png"
							class="nav-img"
							alt="dashboard">
						<h3> Dashboard</h3>
					</div>

					<div class="option2 nav-option">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
							class="nav-img"
							alt="Update Profile">
						<h3> Articles</h3>
					</div>

					<div class="nav-option option3">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png"
							class="nav-img"
							alt="report">
						<h3> Report</h3>
					</div>

					<div class="nav-option option4">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/6.png"
							class="nav-img"
							alt="About">
						<h3> About</h3>
					</div>

					<div class="nav-option option5">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png"
							class="nav-img"
							alt="blog">
						<h3> Contact Us</h3>
					</div>

					

					<div class="nav-option logout">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png"
							class="nav-img"
							alt="logout">
						<h3>Logout</h3>
					</div>

				</div>
			</nav>
		</div>
		<div class="main">

			<div class="searchbar2">
				<input type="text"
					name=""
					id=""
					placeholder="Search">
				<div class="searchbtn">
				<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
						class="icn srchicn"
						alt="search-button">
				</div>
			</div>

<div class="news-container" id="newsContainer">
  <!-- News articles will be displayed here -->
</div>

			

			

					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="index.js"></script>
	<script>
		// Function to fetch and display news articles
		async function fetchNews() {
		  const apiKey = 'c9a0a130f49844e78381f85cbd6b2413';
		  const apiUrl = 'https://newsapi.org/v2/everything?q=bitcoin&apiKey=' + apiKey;
	  
		  try {
			const response = await fetch(apiUrl);
			const data = await response.json();
			const articles = data.articles;
	  
			const newsContainer = document.querySelector('.news-container');
	  
			articles.forEach(article => {
			  const articleElement = document.createElement('div');
			  articleElement.classList.add('article');
			  articleElement.innerHTML = `
				<h2>${article.title}</h2>
				<p>${article.description}</p>
				<a href="${article.url}" target="_blank">Read more</a>
			  `;
			  newsContainer.appendChild(articleElement);
			});
		  } catch (error) {
			console.error('Error fetching data:', error);
		  }
		}
	  
		// Call the fetchNews function when the page loads
		window.addEventListener('load', fetchNews);
	  </script>
	  <script src="index1.js"></script>
	  
	  
</body>
</html>

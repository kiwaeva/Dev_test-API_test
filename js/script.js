function searchProducts() {
	let query = document.getElementById("searchInput").value;
	if (!query) {
		alert("Please enter a search term");
		return;
	}

	fetch("search.php?title=" + encodeURIComponent(query))
		.then((response) => response.json())
		.then((data) => {
			let resultsDiv = document.getElementById("results");
			resultsDiv.innerHTML = "";

			if (data.error) {
				resultsDiv.innerHTML = '<p style="color: red;">' + data.error + "</p>";
				return;
			}

			data.forEach((product) => {
				// Get the image URL (using 'img_sml' field)
				let imageUrl = product.img_sml || "images/default-image.jpg"; // Fallback image if no image available

				// Display the image, title, and destination in the requested order
				resultsDiv.innerHTML += `
                    <div class="product-container">
                        <img src="${imageUrl}" alt="${product.title}" style="max-width: 200px; height: auto;">
                        <h3>${product.title}</h3>
                        <p>Destination: ${product.dest}</p>
                    </div>
                `;
			});
		})
		.catch((error) => console.error("Error:", error));
}

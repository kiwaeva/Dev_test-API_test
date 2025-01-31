# Product Search Application

## Description

The **Product Search** application allows users to search for products based on a title. It integrates with an external API to fetch product data and dynamically display results without refreshing the page. The application includes frontend and backend components: HTML for the user interface, PHP for server-side logic and API interaction, JavaScript for dynamic functionality, and CSS for styling.

## Technologies Used

- **HTML**: Used for the structure and layout of the page.
- **PHP**: Handles server-side logic, processes search requests, and makes API calls.
- **JavaScript (Fetch API)**: Manages asynchronous API requests and dynamically updates the page with search results.
- **CSS**: Provides basic styling for the user interface.
- **cURL**: Used in PHP to make the API request to an external endpoint.

## Installation Instructions

### Prerequisites

- **PHP**: Ensure you have PHP installed on your local server or hosting environment.
- **cURL**: Ensure that the `cURL` extension is enabled in your PHP configuration (`php.ini`).

### Steps:

1. Clone or download the project repository to your local machine or web server.
2. Navigate to the project directory:
3. Place the PHP files, HTML, CSS, and JavaScript in the appropriate directories.

- The HTML file should be placed as `index.html`.
- PHP script (`search.php`) should be placed in the root or a relevant folder.
- JavaScript files in a `js/` folder.
- CSS files in a `css/` folder.

4. Start your local development server (e.g., using `php -S localhost:8000` for PHP’s built-in server).
5. Open the `index.html` file in your browser and begin using the product search.

## Usage Instructions

1. Open the **Product Search** web page.
2. Enter a search term in the input field.
3. Click the "Search" button to submit your query.
4. The application will display product results (or an error if no products are found) below the input field.

## Code Explanation

### Frontend: `index.html`

This file serves as the user interface for the search feature:

- **Search Form**: Allows users to input a search term and submit it to the server.
- **Styling**: Linked to an external CSS file for styling.
- **JavaScript**: Uses the external `js/script.js` file for dynamic product fetching.

### Backend: `search.php`

Handles the server-side logic for fetching and displaying product data:

- Accepts the search term from the user via a POST request.
- Sends the search term to an external API to retrieve product information.
- Displays the results or an error message if no data is found.

### JavaScript: `js/script.js`

The `searchProducts` function enables dynamic product fetching and result display:

- **Grabs the search query** from the user input.
- Sends a `fetch()` request to the `search.php` API endpoint with the search query.
- **Handles the API response** and displays the results dynamically.
- Displays error messages if something goes wrong (e.g., no products found, API errors).

### CSS: `css/styles.css`

This file defines the visual design for the page:

- Basic layout and styling for the search input, button, and results.
- Ensures a clean, readable UI for displaying product information.

## How the Search Works

1. **User Input**: When the user enters a search term and clicks "Search", the form triggers the `searchProducts` function (if using JavaScript for dynamic behavior) or submits the search term to the backend via a POST request.
2. **API Call**: The search term is passed to the PHP script, which then makes an API call using cURL to the external endpoint.
3. **Displaying Results**: The API returns a list of products that match the search term. These results are displayed dynamically on the page, showing product details like title, destination, and image.

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['search']) && !empty(trim($_POST['search']))) { 
        $searchTerm = trim($_POST['search']); // Remove unnecessary spaces
        echo "Searching for: " . htmlspecialchars($searchTerm); // Prevents XSS attacks

        // Make the API call
        $url = "https://global.atdtravel.com/api/products?geo=en&title=" . urlencode($searchTerm);
        
        // Initialize cURL session
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); // Set URL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Return response as string
        $response = curl_exec($ch);

        if(curl_errno($ch)) {
            echo "Error in API request: " . curl_error($ch);
        } else {
            // Decode the JSON response
            $data = json_decode($response, true);

            // Check if there are results
            if (isset($data['meta']['count']) && $data['meta']['count'] > 0) {
                echo "<br><br>Found " . $data['meta']['count'] . " results for your search.";
                foreach ($data['data'] as $product) {
                    // Get the image URL (using 'img_sml' field for the small image)
                    $imageUrl = isset($product['img_sml']) ? $product['img_sml'] : 'default-image.jpg'; // Fallback to default image if not found

                    // Display product info
                    echo "<br><br><div class='product-container'>";
                    echo "<img src='$imageUrl' alt='" . htmlspecialchars($product['title']) . "' style='max-width: 200px; height: auto;'>";
                    echo "<h3>" . $product['title'] . "</h3>";
                    echo "<p>Destination: " . $product['dest'] . "</p>";
                    echo "<p>Price: " . $product['price_from_adult'] . " GBP</p>";
                    echo "</div>";
                    echo "<br><hr>";
                }
            } else {
                echo "<br>No products found for your search.";
            }
        }

        curl_close($ch);
    } else {
        echo "Search term is required.";
    }
} else {
    echo "Invalid request method.";
}
?>

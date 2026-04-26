<?php

$apiKey = "YOUR_API_KEY";

$dataSummary = "Sample dataset uploaded. Provide insights and recommendations.";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/chat/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);

$headers = [
    "Content-Type: application/json",
    "Authorization: Bearer $apiKey"
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$postData = [
    "model" => "gpt-4o-mini",
    "messages" => [
        ["role" => "user", "content" => "Analyze this data: $dataSummary"]
    ]
];

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);

echo "<h2>AI Analysis Result</h2>";
echo "<p>" . $result['choices'][0]['message']['content'] . "</p>";

//<?php

//echo "<h2>AI Analysis Result</h2>";

// Simulated AI logic (safe, no API needed)
//echo "<p><strong>Insights:</strong></p>";
//echo "<ul>
//<li>Electronics category shows the highest values.</li>
//<li>Furniture has lower performance compared to other categories.</li>
//<li>Data indicates variation across different categories.</li>
//</ul>";

//echo "<p><strong>Recommendations:</strong></p>";
//echo "<ul>
//<li>Focus on high-performing categories like Electronics.</li>
//<li>Improve strategies for low-performing categories.</li>
//<li>Track trends over time for better decision-making.</li>
//</ul>";

//
?>
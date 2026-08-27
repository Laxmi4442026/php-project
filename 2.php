<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP with HTML Paragraph</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            border-bottom: 3px solid #007bff;
            padding-bottom: 10px;
        }
        p {
            color: #555;
            line-height: 1.8;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            // PHP variables
            $name = "Laxmi";
            $age = 25;
            $city = "India";
            $hobby = "Programming";
            
            // Display heading
            echo "<h1>Welcome to My PHP Page</h1>";
            
            // Paragraph 1
            echo "<p>";
            echo "Hello my name is <strong>" . $name . "</strong>. ";
            echo "I am " . $age . " years old and I live in " . $city . ". ";
            echo "I love " . $hobby . " and I am passionate about learning new technologies.";
            echo "</p>";
            
            // Paragraph 2
            echo "<p>";
            echo "This is the second paragraph which shows how we can use HTML and PHP together. ";
            echo "PHP allows us to dynamically generate HTML content on the server side. ";
            echo "This makes it very powerful for creating dynamic web pages.";
            echo "</p>";
            
            // Paragraph 3
            echo "<p>";
            echo "In this third paragraph, I am demonstrating the use of PHP variables and string concatenation. ";
            echo "We can embed variables directly into HTML content to create personalized and dynamic pages. ";
            echo "This is a fundamental skill for web development!";
            echo "</p>";
        ?>
    </div>
</body>
</html>

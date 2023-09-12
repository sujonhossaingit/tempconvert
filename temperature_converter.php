<?php
// Initialize variables
$result = "";
$inputTemp = "";
$conversionTo = "";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get input values from the form
    $inputTemp = $_POST['temperature'];
    $conversionTo = $_POST['conversion'];

    // Check the conversion direction and perform the conversion
    if ($conversionTo === "celsius-to-fahrenheit") {
        $convertedTemp = ($inputTemp * 9/5) + 32;
        $result = "$inputTemp&deg; Celsius is equal to $convertedTemp&deg; Fahrenheit.";
    } elseif ($conversionTo === "fahrenheit-to-celsius") {
        $convertedTemp = ($inputTemp - 32) * 5/9;
        $result = "$inputTemp&deg; Fahrenheit is equal to $convertedTemp&deg; Celsius.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Temperature Converter</title>
    <style>
        .form {align: center;}
    </style>
</head>
<body>
    <h1>Temperature Converter</h1>

    <form method="post">
        <label for="temperature">Enter Temperature:</label>
        <input type="number" name="temperature" id="temperature" value="<?php echo $inputTemp; ?>" required>
        <br><br>

        <label for="conversion">Select Conversion:</label>
        <select name="conversion" id="conversion">
            <option value="celsius-to-fahrenheit" <?php if ($conversionTo === "celsius-to-fahrenheit") echo "selected"; ?>>Celsius to Fahrenheit</option>
            <option value="fahrenheit-to-celsius" <?php if ($conversionTo === "fahrenheit-to-celsius") echo "selected"; ?>>Fahrenheit to Celsius</option>
        </select>
        <br><br>

        <input type="submit" name="convert" value="Convert">
    </form>

    <?php
    // Display the converted temperature if available
    if ($result !== "") {
        echo "<p>$result</p>";
    }
    ?>
</body>
</html>

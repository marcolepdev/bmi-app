<?php
$errorMessage = '';
$resultMessage = '';
$bmi = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['weight']) && isset($_POST['height']) && is_numeric($_POST['weight']) && is_numeric($_POST['height']) && $_POST['weight'] > 0 && $_POST['height'] > 0) {
        
        $weight = floatval($_POST['weight']);
        $height = floatval($_POST['height']);
        
        $bmi = $weight / ($height * $height);
        
        if ($bmi < 18.5) {
            $resultMessage = "Your BMI is $bmi. You are underweight.";
        } elseif ($bmi >= 18.5 && $bmi < 24.9) {
            $resultMessage = "Your BMI is $bmi. You are normal weight.";
        } elseif ($bmi >= 25 && $bmi < 29.9) {
            $resultMessage = "Your BMI is $bmi. You are overweight.";
        } else {
            $resultMessage = "Your BMI is $bmi. You are obese.";
        }
    } else {
        $errorMessage = 'Please enter valid values for weight and height.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>BMI Calculator</title>

</head>
<body>

<div class="container">
    <h1>BMI Calculator</h1>
    
    <form method="POST">
        <label for="weight">Weight (in kg):</label>
        <input type="number" name="weight" id="weight" step="0.1" required>

        <label for="height">Height (in meters):</label>
        <input type="number" name="height" id="height" step="0.01" required>

        <button type="submit">Calculate BMI</button>
    </form>

    <?php if ($errorMessage): ?>
        <p class="error"><?php echo $errorMessage; ?></p>
    <?php endif; ?>

    <?php if ($resultMessage): ?>
        <p class="result"><?php echo $resultMessage; ?></p>
    <?php endif; ?>
</div>

</body>
</html>

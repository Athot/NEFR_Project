<?php
include 'connection.php';
session_start();

$recipe_id1 = isset($_GET['pid']) ? intval($_GET['pid']) : 0;

// Fetch recipe details
$query = "SELECT * FROM nefr_recipeupload WHERE recipe_id=?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, 'i', $recipe_id1);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$recipe = mysqli_fetch_array($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload'])) {
    $username1 = mysqli_real_escape_string($con, $_POST['username']);
    $user_review1 = mysqli_real_escape_string($con, $_POST['user_review']);
    $category = mysqli_real_escape_string($con, $_POST['user_rating']);
    $id = intval($_POST['r_id']);

    if ($id > 0) {
        $query = "INSERT INTO review_table (user_name, user_rating, user_review, datetime, recipe_id) VALUES (?, ?, ?, NOW(), ?)";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, 'sssi', $username1, $category, $user_review1, $id);
        mysqli_stmt_execute($stmt);
        header('Location: product.php?pid=' . $id);
        exit();
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>Review & Rating System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="css_page/print.css" media="print">

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel = "stylesheet" href="styles.css">
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel = "stylesheet" href="css_page/product.css"/>
   

</head>
<body>
    <?php include 'heading.php'; ?>

    <div class='box-container'>
        <?php if ($recipe): ?>
            <img src='<?php echo htmlspecialchars($recipe['image']); ?>' height='300px' width='400px'><br>
            <div class='sub-container'>
                <h2>Title</h2><?php echo htmlspecialchars($recipe['title']); ?><br>
                <h2>Ingredients</h2><?php echo htmlspecialchars($recipe['ingredients']); ?><br>
                <h2>Serving</h2><?php echo htmlspecialchars($recipe['serve']); ?><br>
                <h2>Total Time to cook</h2><?php echo htmlspecialchars($recipe['Time']); ?><br>
                <h2>Category</h2><?php echo htmlspecialchars($recipe['category']); ?><br>
                <h2>State</h2><?php echo htmlspecialchars($recipe['state']); ?><br>
            </div>
        <?php else: ?>
            <p>Recipe not found.</p>
        <?php endif; ?>
    </div>

    <div class="review-box">
        <form action='' method='POST'>
            <input type='hidden' name='r_id' value='<?php echo htmlspecialchars($recipe_id1); ?>'/>
            <h1 class='upload__heading'>Recipe data</h1>
            <label>Name</label>
            <input type='text' name='username' placeholder='Name' required>
            <br/>
            <h3 class="text">Thanks for rating us!</h3>
            <div class="star-widget">
                <input type="radio" name='user_rating' value="⭐" id="rate-5"><label for="rate-5" class="fas fa-star"></label>
                <input type="radio" name='user_rating' value="⭐⭐" id="rate-4"><label for="rate-4" class="fas fa-star"></label>
                <input type="radio" name='user_rating' value="⭐⭐⭐" id="rate-3"><label for="rate-3" class="fas fa-star"></label>
                <input type="radio" name='user_rating' value="⭐⭐⭐⭐" id="rate-2"><label for="rate-2" class="fas fa-star"></label>
                <input type="radio" name='user_rating' value="⭐⭐⭐⭐⭐" id="rate-1"><label for="rate-1" class="fas fa-star"></label>
            </div>
            <p>User Review</p>
            <textarea id='text' cols='100' rows='4' name='user_review' placeholder='Please fill up your ingredients details...' required></textarea>
            <br>
            <?php if (isset($_SESSION['userid'])): ?>
                <button type='submit' name='upload' class='btn btn-outline-success'>POST</button>
            <?php else: ?>
                <p>Please log in to submit a review.</p>
            <?php endif; ?>
            <button type="button" onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
        </form>
    </div>

    <?php
    $query = "SELECT * FROM review_table WHERE recipe_id=?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 'i', $recipe_id1);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_array($result)) {
        echo "
        <div class='design' id='print-btn'>
            <h3>User Name</h3>" . htmlspecialchars($row['user_name']) . "<br>
            <h2>User Rating</h2>" . htmlspecialchars($row['user_rating']) . "<br>
            <h2>User Review</h2>" . htmlspecialchars($row['user_review']) . "<br>
            <h2>Date Time</h2>" . htmlspecialchars($row['datetime']) . "<br>
        </div>";
    }
    ?>

    <?php include 'footer.php'; ?>
    <script src="app/myRecipe.js"></script>
</body>
</html>

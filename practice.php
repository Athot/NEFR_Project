<?php
function getStreamlitResponse($question) {
    $url = 'http://localhost:8501/';  // Change to your Streamlit app's URL
    $data = array('question' => $question);
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ }
    return $result;
}

// Example usage
$response = getStreamlitResponse('How many entries of records are present?');
echo $response;
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $question = $_POST['question'];
    $response = getStreamlitResponse($question);
    // Display the response or process it further
    echo "Response from Streamlit: " . $response;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Streamlit Integration</title>
</head>
<body>
    <form method="post">
        <label for="question">Ask a question:</label>
        <input type="text" id="question" name="question">
        <button type="submit">Submit</button>
    </form>
</body>
</html>

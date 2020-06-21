<html lang="en">
<head>

<title>Contact Form</title>

<link href="styles.css" rel="stylesheet" type="text/css">

</head>

<body>

  <form role="form"
        method="post"
        action="submit.php">

  <label for="first-name" class="control-label">First Name <span class="red">*</span></label>
    <input type="text" id="first-name" name="first-name" required>

  <label for="last-name" class="control-label">Last Name <span class="red">*</span></label>
    <input type="text" id="last-name" name="last-name" required>

  <label for="emailaddress" class="control-label">Email <span class="red">*</span></label>
    <input type="email" id="emailaddress" name="emailaddress" required>

  <!-- SPAM CATCH -->
    <input type="text" id="email" name="email" class="hidden"/>

  <label for="comments">Comments</label>
    <textarea rows="5" id="comments" name="comments"></textarea>

  <button type="submit">Submit</button>
</form>


</body>
</html>

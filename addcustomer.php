<html>

<head>
    <title>Test Add Customer Form</title>
</head>

<body>
    <h1>Test Form</h1>
    <form action="addcustomer.php" method="POST">

        <label for="CustomerID">Customer ID :</label><br>
        <input type="text" placeholder="Enter Customer ID" name="CustomerID">
        <br> <br>

        <label for="Name">Customer Name :</label><br>
        <input type="text" placeholder="Enter your Name" name="Name">
        <br> <br>

        <input type="date" placeholder="Enter your Birthdate" name="Birthdate">
        <br> <br>

        <label for="Email">Customer email :</label><br>
        <input type="email" placeholder="Enter your Email" name="Email">
        <br> <br>

        <label for="CountryCode">Country :</label><br>
        <input type="text" placeholder="Enter your Country" name="CountryCode">
        <br> <br>

        <label for="OutstandingDebt">OutstandingDebt :</label><br>
        <input type="text" placeholder="Enter your OutstandingDebt" name="OutstandingDebt">
        <br> <br>


        <input type="submit">
    </form>
</body>

</html>

<?php
if (isset($_POST['CustomerID']) && isset($_POST['Name'])):
    echo "<br>" . $_POST['CustomerID'] . $_POST['Name'] . $_POST['Birthdate'] . $_POST['Email'] . $_POST['CountryCode'] . $_POST['OutstandingDebt'];

    require 'connect.php';

    $sql = "insert into customer values(:CustomerID, :Name, :Birthdate, :Email, :CountryCode, :OutstandingDebt)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':CustomerID', $_POST['CustomerID']);
    $stmt->bindParam(':Name', $_POST['Name']);
    $stmt->bindParam(':Birthdate', $_POST['Birthdate']);
    $stmt->bindParam(':Email', $_POST['Email']);
    $stmt->bindParam(':CountryCode', $_POST['CountryCode']);
    $stmt->bindParam(':OutstandingDebt', $_POST['OutstandingDebt']);

    if ($stmt->execute()) :
        $message = 'Suscessfully add new customer';
    else :
        $message = 'Fail to add new customer';
    endif;
    echo $message;
    $conn = null;
endif;
?>
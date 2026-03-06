<?php
require 'connect.php';

$sql_select = "SELECT * FROM country ORDER BY CountryCode";
$stmt_s = $conn->prepare($sql_select);
$stmt_s->execute();

if (isset($_POST['submit'])) {

    if (!empty($_POST['CustomerID']) && !empty($_POST['Name'])) {

        $sql = "INSERT INTO customer 
        (CustomerID, Name, Birthdate, Email, CountryCode, OutstandingDebt)
        VALUES 
        (:CustomerID, :Name, :Birthdate, :Email, :CountryCode, :OutstandingDebt)";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':CustomerID', $_POST['CustomerID']);
        $stmt->bindParam(':Name', $_POST['Name']);
        $stmt->bindParam(':Birthdate', $_POST['Birthdate']);
        $stmt->bindParam(':Email', $_POST['Email']);
        $stmt->bindParam(':CountryCode', $_POST['CountryCode']);
        $stmt->bindParam(':OutstandingDebt', $_POST['OutstandingDebt']);

        $result = $stmt->execute();

        if ($result) {
            echo "Insert success";
        } else {
            echo "Insert failed";
        }
    }
}
?>

<html>

<head>
    <title>User Registration</title>
</head>

<body>
    <h1>Add customer but not in order of columns</h1>
    <form action="addcustomer_dropdownfull.php" method="POST">

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

        <label for="OutstandingDebt">OutstandingDebt :</label><br>
        <input type="text" placeholder="Enter your OutstandingDebt" name="OutstandingDebt">
        <br> <br>

        <label>Select a country</label>
        <select name="CountryCode">

            <?php
            while ($cc = $stmt_s->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <option value="<?php echo $cc["CountryCode"]; ?>">
                    <?php echo $cc["CountryName"]; ?>
                </option>
            <?php
            }
            ?>

        </select>

        <!-- <label>Select a country code</label>
        <select name="CountryCode">
            <?php
            require 'connect.php';

            while ($cc = $stmt_s->fetch(PDO::FETCH_ASSOC)):;
            ?>
                <option value="<?php echo $cc["CountryCode"]; ?>">
                    <?php echo $cc["CountryName"]; ?>
                </option>
            <?php
            endwhile;
            ?>

        </select> -->
        <br> <br>

        <input type="submit" value="Submit" name="submit" />
    </form>
</body>

</html>

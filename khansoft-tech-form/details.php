<?php

// Retrieve name and phone from GET request
$name = $_GET['name'];
$phone = $_GET['phone'];

// Output name and phone
echo '<h2>Details</h2>';
echo '<p><strong>Name:</strong> ' . $name . '</p>';
echo '<p><strong>Phone:</strong> ' . $phone . '</p>';

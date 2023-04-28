<?php

/**
 * Plugin Name: Khansoft Tech Form
 * Plugin URI: https://yourdomain.com/plugins/contact-form-plugin/
 * Description: This is a custom form plugin for Khansoft Tech.
 * Version: 1.0.0
 * Author: Malcolm Macharia
 * Author URI: https://example.com/
 * License: GPL2
 */

if (!defined('ABSPATH')) {
    die('You cannot be here');
}

function khansoft_tech_forms()
{
    add_menu_page(
        'Khansoft Tech Forms',
        'Khansoft Tech Forms',
        'manage_options',
        'khansoft-tech-forms',
        'khansoft_tech_forms_main',
        'dashicons-menu',
        2
    );

    add_submenu_page(
        'khansoft-tech-forms',
        'Student Application',
        'Student Application',
        'manage_options',
        'student-application-menu',
        'student_application_menu_main',
        'dashicons-media-document'
    );

    add_submenu_page(
        'khansoft-tech-forms',
        'Contacts',
        'Contacts',
        'manage_options',
        'contacts-menu',
        'contacts_menu_main',
        'dashicons-media-document'
    );

    add_submenu_page(
        'khansoft-tech-forms',
        'Job Applications',
        'Job Applications',
        'manage_options',
        'job-application-menu',
        'job_application_menu_main',
        'dashicons-media-document'
    );

    add_submenu_page(
        'khansoft-tech-forms',
        'LPN Applications',
        'LPN Applications',
        'manage_options',
        'lpn-application-menu',
        'lpn_application_menu_main',
        'dashicons-media-document'
    );
}

add_action('admin_menu', 'khansoft_tech_forms');


function student_application_menu_main()
{
    // Connect to the database (replace 'hostname', 'username', 'password', and 'database' with your actual database credentials)
    $dsn = 'mysql:host=hostname;dbname=database';
    $username = 'username';
    $password = 'password';

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('Connection failed: ' . $e->getMessage());
    }

    // Fetch students from the database
    $query = "SELECT id, name, phone FROM students";
    $stmt = $pdo->query($query);
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Define table header
    $table = '<table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';

    // Define table rows using data from the database
    foreach ($students as $student) {
        $id = $student['id'];
        $table .= '<tr id="row-' . $id . '">
                     <td>' . $student['name'] . '</td>
                     <td>' . $student['phone'] . '</td>
                     <td class="action"><a class="btn btn-success" href="' . add_query_arg(array('id' => $id), plugins_url('details.php', __FILE__)) . '">View Details</a></td>
                  </tr>';
    }

    // Close table tags
    $table .= '</tbody>
              </table>';

    // Output table and styling
    echo '<!DOCTYPE html>
          <html>
            <head>
              <title>Student Application</title>
              <link rel="stylesheet" type="text/css" href="' . plugins_url('style.css', __FILE__) . '">
            </head>
            <body>
              <h1>Student Application</h1>
              ' . $table . '
            </body>
          </html>';
}


function contacts_menu()
{
}

function contacts_menu_main()
{
    // Connect to the database (replace 'hostname', 'username', 'password', and 'database' with your actual database credentials)
    $dsn = 'mysql:host=hostname;dbname=database';
    $username = 'username';
    $password = 'password';

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('Connection failed: ' . $e->getMessage());
    }

    // Fetch contacts from the database
    $query = "SELECT id, name, phone FROM contacts";
    $stmt = $pdo->query($query);
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Define table header
    $table = '<table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';

    // Define table rows using data from the database
    foreach ($contacts as $contact) {
        $id = $contact['id'];
        $table .= '<tr id="row-' . $id . '">
                     <td>' . $contact['name'] . '</td>
                     <td>' . $contact['phone'] . '</td>
                     <td class="action"><a class="btn btn-success" href="' . add_query_arg(array('id' => $id), plugins_url('details.php', __FILE__)) . '">View Details</a></td>
                  </tr>';
    }

    // Close table tags
    $table .= '</tbody>
              </table>';

    // Output table and styling
    echo '<!DOCTYPE html>
          <html>
            <head>
              <title>Contacts</title>
              <link rel="stylesheet" type="text/css" href="' . plugins_url('style.css', __FILE__) . '">
            </head>
            <body>
              <h1>Contacts</h1>
              ' . $table . '
            </body>
          </html>';
}



function job_application_menu()
{
}

function job_application_menu_main()
{
    // Connect to the database (replace 'hostname', 'username', 'password', and 'database' with your actual database credentials)
    $dsn = 'mysql:host=hostname;dbname=database';
    $username = 'username';
    $password = 'password';

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('Connection failed: ' . $e->getMessage());
    }

    // Fetch job applications from the database
    $query = "SELECT id, name, phone FROM job_applications";
    $stmt = $pdo->query($query);
    $job_applications = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Define table header
    $table = '<table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';

    // Define table rows using data from the database
    foreach ($job_applications as $job_application) {
        $id = $job_application['id'];
        $table .= '<tr id="row-' . $id . '">
                     <td>' . $job_application['name'] . '</td>
                     <td>' . $job_application['phone'] . '</td>
                     <td class="action"><a class="btn btn-success" href="' . add_query_arg(array('id' => $id), plugins_url('details.php', __FILE__)) . '">View Details</a></td>
                  </tr>';
    }

    // Close table tags
    $table .= '</tbody>
              </table>';

    // Output table and styling
    echo '<!DOCTYPE html>
          <html>
            <head>
              <title>Job Application</title>
              <link rel="stylesheet" type="text/css" href="' . plugins_url('style.css', __FILE__) . '">
            </head>
            <body>
              <h1>Job Application</h1>
              ' . $table . '
            </body>
          </html>';
}

function lpn_application_menu()
{
}
function lpn_application_menu_main()
{
    // Connect to the database (replace 'hostname', 'username', 'password', and 'database' with your actual database credentials)
    $dsn = 'mysql:host=hostname;dbname=database';
    $username = 'username';
    $password = 'password';

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('Connection failed: ' . $e->getMessage());
    }

    // Fetch LPN applications from the database
    $query = "SELECT id, name, phone FROM lpn_applications";
    $stmt = $pdo->query($query);
    $lpn_applications = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Define table header
    $table = '<table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';

    // Define table rows using data from the database
    foreach ($lpn_applications as $lpn_application) {
        $id = $lpn_application['id'];
        $table .= '<tr id="row-' . $id . '">
                     <td>' . $lpn_application['name'] . '</td>
                     <td>' . $lpn_application['phone'] . '</td>
                     <td class="action"><a class="btn btn-success" href="' . add_query_arg(array('id' => $id), plugins_url('details.php', __FILE__)) . '">View Details</a></td>
                  </tr>';
    }

    // Close table tags
    $table .= '</tbody>
              </table>';

    // Output table and styling
    echo '<!DOCTYPE html>
          <html>
            <head>
              <title>LPN Application</title>
              <link rel="stylesheet" type="text/css" href="' . plugins_url('style.css', __FILE__) . '">
            </head>
            <body>
              <h1>LPN Application</h1>
              ' . $table . '
            </body>
          </html>';
}

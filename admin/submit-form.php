<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
require_once "./codes/db.php"; // Your existing MySQLi DB connection file

// Google Apps Script Web App URL
const GOOGLE_SHEET_URL = 'https://script.google.com/macros/s/AKfycbwxP_8j_TCC22qRbCB1EocToxxhxnhEy5WE1OEVu1rIc7fTWqv89f7XIbNezsTMSqoZ/exec';

// Enable error logging
ini_set('log_errors', 1);
ini_set('error_log', 'path/to/your/php_error.log'); // Update this path to a writable location

// Function to send data to Google Sheet with debugging
function sendToGoogleSheet($data) {
    $ch = curl_init(GOOGLE_SHEET_URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    $jsonData = json_encode($data);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_VERBOSE, true); // Enable verbose output for debugging
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    $curlErrno = curl_errno($ch);
    
    // Log curl details
    error_log("Google Sheet Request Data: " . $jsonData);
    error_log("Google Sheet HTTP Code: " . $httpCode);
    error_log("Google Sheet Response: " . $response);
    if ($curlError) {
        error_log("cURL Error #{$curlErrno}: " . $curlError);
    }
    
    curl_close($ch);
    
    $decodedResponse = $httpCode === 200 ? json_decode($response, true) : false;
    if ($decodedResponse === false) {
        error_log("Failed to decode Google Sheet response: " . json_last_error_msg());
    }
    
    return $decodedResponse;
}

// Function to send emails (unchanged)
function sendEmails($data, $enquiry_id, $db) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'shivamsingh19989@gmail.com';
        $mail->Password = 'lckt mzhu pmvz ieze';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('leagalhouse001@gmail.com', 'Travel Agency');
        $mail->addAddress('shivamsingh19989@gmail.com', 'Admin');
        $mail->isHTML(true);
        $mail->Subject = 'New Enquiry from ' . $data['first_name'] . ' ' . $data['last_name'];
        $mail->Body = "
            <html>
                <body>
                    <h3>New Travel Enquiry Submission (ID: {$enquiry_id})</h3>
                    <p><strong>Name:</strong> {$data['first_name']} {$data['last_name']}</p>
                    <p><strong>Email:</strong> {$data['email']}</p>
                    <p><strong>Mobile:</strong> {$data['mobile']}</p>
                    <p><strong>Package:</strong> {$data['package_name']}</p>
                    <p><strong>Total Persons:</strong> {$data['total_persons']}</p>
                    <p><strong>Adults (M/F):</strong> {$data['adult_male']} / {$data['adult_female']}</p>
                    <p><strong>Children (M/F):</strong> {$data['children_male']} / {$data['children_female']}</p>
                    <p><strong>Travel Date:</strong> {$data['travel_date']}</p>
                    <p><strong>Number of Days:</strong> {$data['num_days']}</p>
                    <p><strong>Ticket Booked:</strong> {$data['ticket_booked']}</p>
                    <p><strong>Customize Package:</strong> {$data['customize_package']}</p>
                    <p><strong>Message:</strong><br>" . nl2br($data['message'] ?? 'N/A') . "</p>
                </body>
            </html>";
        $mail->AltBody = "New Travel Enquiry Submission (ID: {$enquiry_id})\nName: {$data['first_name']} {$data['last_name']}\nEmail: {$data['email']}\nMobile: {$data['mobile']}\nPackage: {$data['package_name']}\nTotal Persons: {$data['total_persons']}\nAdults (M/F): {$data['adult_male']} / {$data['adult_female']}\nChildren (M/F): {$data['children_male']} / {$data['children_female']}\nTravel Date: {$data['travel_date']}\nNumber of Days: {$data['num_days']}\nTicket Booked: {$data['ticket_booked']}\nCustomize Package: {$data['customize_package']}\nMessage: " . ($data['message'] ?? 'N/A');

        if (!$mail->send()) {
            throw new Exception('Failed to send admin email');
        }

        $mail->clearAddresses();
        $mail->addAddress($data['email'], $data['first_name'] . ' ' . $data['last_name']);
        $mail->Subject = 'Thank You for Your Travel Enquiry';
        $mail->Body = "
            <html>
                <body>
                    <h3>Thank You for Your Enquiry!</h3>
                    <p>Dear {$data['first_name']} {$data['last_name']},</p>
                    <p>Thank you for submitting your travel enquiry with us. We have received your request (ID: {$enquiry_id}) and will get back to you soon.</p>
                    <p><strong>Your Enquiry Details:</strong></p>
                    <p>Package: {$data['package_name']}</p>
                    <p>Total Persons: {$data['total_persons']}</p>
                    <p>Travel Date: {$data['travel_date']}</p>
                    <p>Number of Days: {$data['num_days']}</p>
                    <p>Message: " . nl2br($data['message'] ?? 'N/A') . "</p>
                    <p>We will contact you at {$data['mobile']} or {$data['email']} shortly.</p>
                    <p>Best regards,<br>Travel Agency Team</p>
                </body>
            </html>";
        $mail->AltBody = "Thank You for Your Enquiry!\n\nDear {$data['first_name']} {$data['last_name']},\n\nThank you for submitting your travel enquiry with us. We have received your request (ID: {$enquiry_id}) and will get back to you soon.\n\nYour Enquiry Details:\nPackage: {$data['package_name']}\nTotal Persons: {$data['total_persons']}\nTravel Date: {$data['travel_date']}\nNumber of Days: {$data['num_days']}\nMessage: " . ($data['message'] ?? 'N/A') . "\n\nWe will contact you at {$data['mobile']} or {$data['email']} shortly.\n\nBest regards,\nTravel Agency Team";

        if (!$mail->send()) {
            throw new Exception('Failed to send auto-response email');
        }

        return true;
    } catch (Exception $e) {
        error_log("Email Error: " . $e->getMessage());
        throw $e;
    }
}

// Get form data
$data = json_decode(file_get_contents('php://input'), true);
$step = $data['step'] ?? '';
error_log("Received Data: " . json_encode($data));

// Process based on step
switch ($step) {
    case '1':
        $sql = "INSERT INTO enquiries (first_name, last_name, email, mobile, alternate_mobile) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        if ($stmt === false) {
            error_log("SQL Prepare Error Step 1: " . $db->error);
            echo json_encode(['status' => 'error', 'message' => 'Prepare failed: ' . $db->error]);
            exit;
        }
        
        $alternate_mobile = $data['alternate_mobile'] ?? null;
        $stmt->bind_param("sssss", $data['first_name'], $data['last_name'], $data['email'], $data['mobile'], $alternate_mobile);
        
        if ($stmt->execute()) {
            $enquiry_id = $db->insert_id;
            echo json_encode(['status' => 'success', 'message' => 'Step 1 saved successfully', 'enquiry_id' => $enquiry_id]);
        } else {
            error_log("SQL Execute Error Step 1: " . $stmt->error);
            echo json_encode(['status' => 'error', 'message' => 'Execute failed: ' . $stmt->error]);
        }
        $stmt->close();
        break;

    case '2':
        $sql = "UPDATE enquiries SET total_persons = ?, adult_male = ?, adult_female = ?, children_male = ?, children_female = ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        if ($stmt === false) {
            error_log("SQL Prepare Error Step 2: " . $db->error);
            echo json_encode(['status' => 'error', 'message' => 'Prepare failed: ' . $db->error]);
            exit;
        }
        
        $stmt->bind_param("iiiiii", $data['total_persons'], $data['adult_male'], $data['adult_female'], $data['children_male'], $data['children_female'], $data['enquiry_id']);
        
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Step 2 saved successfully', 'enquiry_id' => $data['enquiry_id']]);
        } else {
            error_log("SQL Execute Error Step 2: " . $stmt->error);
            echo json_encode(['status' => 'error', 'message' => 'Execute failed: ' . $stmt->error]);
        }
        $stmt->close();
        break;

    case '3':
        $sql = "UPDATE enquiries SET package_name = ?, travel_date = ?, num_days = ?, message = ?, ticket_booked = ?, customize_package = ?, status = 'pending', source = 'website' WHERE id = ?";
        $stmt = $db->prepare($sql);
        if ($stmt === false) {
            error_log("SQL Prepare Error Step 3: " . $db->error);
            echo json_encode(['status' => 'error', 'message' => 'Prepare failed: ' . $db->error]);
            exit;
        }
        
        $message = $data['message'] ?? null;
        $stmt->bind_param("sssisss", $data['package_name'], $data['travel_date'], $data['num_days'], $message, $data['ticket_booked'], $data['customize_package'], $data['enquiry_id']);
        
        if ($stmt->execute()) {
            try {
                if (sendEmails($data, $data['enquiry_id'], $db)) {
                    $sheetData = [
                        'timestamp' => date('d/m/Y H:i:s'),
                        'first_name' => $data['first_name'] ?? '',
                        'last_name' => $data['last_name'] ?? '',
                        'email' => $data['email'] ?? '',
                        'mobile' => $data['mobile'] ?? '',
                        'alternate_mobile' => $data['alternate_mobile'] ?? '',
                        'package_name' => $data['package_name'] ?? '',
                        'total_persons' => $data['total_persons'] ?? 0,
                        'adult_male' => $data['adult_male'] ?? 0,
                        'adult_female' => $data['adult_female'] ?? 0,
                        'children_male' => $data['children_male'] ?? 0,
                        'children_female' => $data['children_female'] ?? 0,
                        'travel_date' => $data['travel_date'] ?? '',
                        'num_days' => $data['num_days'] ?? 0,
                        'ticket_booked' => $data['ticket_booked'] ?? 'No',
                        'customize_package' => $data['customize_package'] ?? 'No',
                        'message' => $data['message'] ?? '',
                        'status' => 'pending',
                        'source' => 'website'
                    ];
                    
                    $sheetResponse = sendToGoogleSheet($sheetData);
                    
                    if ($sheetResponse && $sheetResponse['status'] === 'success') {
                        echo json_encode([
                            'status' => 'success',
                            'message' => 'Enquiry submitted successfully, emails sent, and saved to Google Sheets!'
                        ]);
                    } else {
                        $errorDetails = $sheetResponse ? ($sheetResponse['message'] . ': ' . ($sheetResponse['details'] ?? 'No details')) : 'No response from Google Sheets';
                        echo json_encode([
                            'status' => 'success',
                            'message' => 'Enquiry submitted and emails sent, but failed to save to Google Sheets',
                            'debug' => $errorDetails
                        ]);
                    }
                }
            } catch (Exception $e) {
                error_log("Step 3 Email Exception: " . $e->getMessage());
                echo json_encode(['status' => 'error', 'message' => 'Email Error: ' . $e->getMessage()]);
            }
        } else {
            error_log("SQL Execute Error Step 3: " . $stmt->error);
            echo json_encode(['status' => 'error', 'message' => 'Execute failed: ' . $stmt->error]);
        }
        $stmt->close();
        break;

    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid step specified']);
        break;
}

$db->close();
?>
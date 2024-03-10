<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VisitRequestMail;
use App\Mail\AdminNotificationMail;
use App\Models\PropertyDetail;
use App\Models\ClientVisitDetail;

class VisitController extends Controller
{
    public function submitForm(Request $request)
    {
        // Retrieve all form data
        $formData = $request->all();

        // Retrieve property details
        $property = PropertyDetail::find($formData['property_id']);

        // Store the form data in the ClientVisitDetail table
        $visitDetail = ClientVisitDetail::create([
            'visitor_name' => $formData['visitorName'],
            'visitor_contact' => $formData['visitorContact'],
            'visitor_email' => $formData['visitorEmail'],
            'gender' => $formData['gender'],
            'property_id' => $formData['property_id'],
            'property_name' => $property->property_name,
            'visit_date' => $formData['visitDate'],
            'additional_message' => $formData['additionalMessage'] ?? null,
        ]);

        // Send email to the user
        Mail::to($formData['visitorEmail'])->send(new VisitRequestMail($visitDetail));

        // Send email to the admin
        $adminEmail = env('ADMIN_EMAIL', 'codebengal@gmail.com');
        Mail::to($adminEmail)->send(new AdminNotificationMail($visitDetail));

        // Send data to Google Sheets
        $googleFormActionUrl = 'https://docs.google.com/forms/u/0/d/e/1FAIpQLSfo1c7sEXAFdJYCOTF6Ya5aj1GKZAin4ADdTyVxV9AwOlIhLQ/formResponse';
        $googleSheetsUrl = 'https://docs.google.com/spreadsheets/d/1bO9ccezNbzL_CuBheWLqy12rFABycuCzQM77Y0zZhlU/edit?resourcekey#gid=2079393756';
        $this->sendDataToGoogleSheets($googleFormActionUrl, $googleSheetsUrl, $visitDetail);

        return response()->json(['message' => 'Your request has been submitted successfully!']);
    }

    private function sendDataToGoogleSheets($googleFormActionUrl, $googleSheetsUrl, $visitDetail)
    {
        // Check if $visitDetail is an array or an object
        if (is_array($visitDetail)) {
            // Handle the case when $visitDetail is an array
            // You might want to log an error or handle it in some other way
            return; // or throw an exception
        }

        // Prepare the data to be sent to the Google Form
        $postData = [
            'entry.1826920942' => $visitDetail->visitor_name,
            'entry.1660887079' => $visitDetail->visitor_contact,
            'entry.696687991' => $visitDetail->visitor_email,
            'entry.272942780' => $visitDetail->gender,
            'entry.1963745522' => $visitDetail->property_name,
            'entry.1842820359' => $visitDetail->visit_date,
            'entry.788236355' => $visitDetail->additional_message ?? null,
        ];

        // Initialize cURL session
        $ch = curl_init($googleFormActionUrl);

        // Set cURL options
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute cURL session
        $response = curl_exec($ch);

        // Check for errors
        if ($response === false) {
            $error = curl_error($ch);
            // Handle error
        }

        // Close cURL session
        curl_close($ch);

        // Handle the response if needed

        // Now, let's also send the data to the Google Sheet for backup
        $this->sendDataToGoogleSheet($googleSheetsUrl, $visitDetail);
    }

    private function sendDataToGoogleSheet($url, $visitDetail)
    {
        // Prepare the data to be sent to the Google Sheet
        $postData = [
            'visitorName' => $visitDetail->visitor_name,
            'visitorContact' => $visitDetail->visitor_contact,
            'visitorEmail' => $visitDetail->visitor_email,
            'gender' => $visitDetail->gender,
            'property_name' => $visitDetail->property_name,
            'visitDate' => $visitDetail->visit_date,
            'additionalMessage' => $visitDetail->additional_message,
        ];

        // Initialize cURL session
        $ch = curl_init($url);

        // Set cURL options
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute cURL session
        $response = curl_exec($ch);

        // Check for errors
        if ($response === false) {
            $error = curl_error($ch);
            // Handle error
        }

        // Close cURL session
        curl_close($ch);

        // Handle the response if needed
    }
}

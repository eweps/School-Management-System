<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Application Form PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #fff;
            color: #000;
        }

        .wrapper {
            width: 100%;
            max-width: 750px;
            margin: 0 auto;
        }

        .container {
            padding: 20px;
        }

        h2 {
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 18px;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
            margin-bottom: 30px;
        }

        th, td {
            border: 1px solid #999;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }

        th.theading {
            background-color: #e2e8f0; /* Tailwind's slate-200 */
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 12px;
            text-align: center;
        }

        .py-8 {
            padding-top: 25px;
            padding-bottom: 25px;
        }

        tr:nth-child(even) td {
            background-color: #f9f9f9;
        }

        .footer {
            position: fixed;
            bottom: 15mm;
            left: 0;
            right: 0;
            text-align: center;
            font-style: italic;
            font-size: 12px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">

            <div style="text-align: center; margin-bottom: 15px;">
                <img src="{{ public_path('images/logo.png') }}" alt="App Logo" style="max-height: 80px; width: auto; display: inline-block;">
            </div>

            <h2>{{ $application->name }} - <strong>Application Form</strong></h2>

            <table>
                <tr>
                    <th colspan="5" class="theading">Personal Information</th>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>ID Card Number</th>
                    <th>Telephone Number</th>
                </tr>
                <tr>
                    <td>{{ ucwords($application->salutation) . " " . $application->name }}</td>
                    <td>{{ $application->email }}</td>
                    <td>{{ $application->gender }}</td>
                    <td>{{ $application->id_card_number }}</td>
                    <td>{{ $application->phone_number }}</td>
                </tr>

                <tr>
                    <th>Marital Status</th>
                    <th>Date of Birth</th>
                    <th>Place of Birth</th>
                    <th>Preferred Language</th>
                    <th>Address</th>
                </tr>
                <tr>
                    <td>{{ $application->marital_status }}</td>
                    <td>{{ $application->date_of_birth }}</td>
                    <td>{{ $application->place_of_birth }}</td>
                    <td>{{ $application->preferred_language }}</td>
                    <td>{{ $application->address }}</td>
                </tr>

                <tr>
                    <th colspan="5" class="theading">Program Selection</th>
                </tr>
                <tr>
                    <th colspan="3">Type of Diploma</th>
                    <th colspan="2">Course Session</th>
                </tr>
                <tr>
                    <td colspan="3" class="py-8">{{ $application->diplomaType->name }}</td>
                    <td colspan="2" class="py-8">{{ $application->courseSession->name }}</td>
                </tr>

                <tr>
                    <th colspan="5" class="theading">Academic Information</th>
                </tr>
                <tr>
                    <th colspan="3">Academic Diploma</th>
                    <th colspan="2">Professional Diploma</th>
                </tr>
                <tr>
                    <td colspan="3" class="py-8">{{ $application->academic_diploma ?? "------" }}</td>
                    <td colspan="2" class="py-8">{{ $application->professional_diploma ?? "------" }}</td>
                </tr>

                <tr>
                    <th colspan="3">Professional Experience</th>
                    <th colspan="2">Other Relevant Information</th>
                </tr>
                <tr>
                    <td colspan="3" class="py-8">{{ $application->professional_experience ?? "------" }}</td>
                    <td colspan="2" class="py-8">{{ $application->other_relevant_information ?? "------" }}</td>
                </tr>
            </table>
        </div>
    </div>

      <!-- Footer -->
  
    <div class="footer">
        Generated by {{ config('app.name') }} on {{ now()->setTimezone($timezone)->format('Y-m-d') }} at {{ now()->setTimezone($timezone)->format('H:i a') }}
    </div>

  

    
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script>
        function openPopup() {
            document.getElementById("popup").style.display = "block";
            document.getElementById("overlay").style.display = "block";
        }

        function closePopup() {
            document.getElementById("popup").style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }

        function openEditPopup(contact) {
            document.getElementById('editContactId').value = contact.id;
            document.getElementById('editFirstname').value = contact.firstname;
            document.getElementById('editLastname').value = contact.lastname;
            document.getElementById('editBirthdate').value = contact.birthdate;
            document.getElementById('editWorkphone').value = contact.workphone;
            document.getElementById('editHomephone').value = contact.homephone;
            document.getElementById('editEmail').value = contact.email;

            document.getElementById('editOverlay').style.display = 'block';
            document.getElementById('editPopup').style.display = 'block';
        }


        function closeEditPopup() {
            document.getElementById('editOverlay').style.display = 'none';
            document.getElementById('editPopup').style.display = 'none';
        }
    </script>
        <!-- Styles -->
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                text-align: center;
            }

            h2 {
                color: #333;
            }

            table {
                width: 80%;
                margin: 20px auto;
                border-collapse: collapse;
                background: white;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                overflow: hidden;
            }

            th,
            td {
                padding: 12px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            th {
                background-color: #007BFF;
                color: white;
            }

            tr:hover {
                background-color: #f1f1f1;
            }

            .popup {
                display: none;
                position: fixed;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                background: white;
                padding: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                width: 500px;
            }

            .popup input {
                width: 100%;
                padding: 10px;
                margin: 10px 0;
                border: 1px solid #ddd;
                border-radius: 4px;
                box-sizing: border-box;
            }

            .popup button {
                width: 100%;
                background-color: #007BFF;
                color: white;
                border: none;
                padding: 10px;
                cursor: pointer;
                border-radius: 4px;
                margin-top: 10px;
            }

            .popup button:hover {
                background-color: #0056b3;
            }

            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
            }

            .add-contact {
                display: block;
                margin: 20px auto;
                color: #007BFF;
                text-decoration: none;
                font-size: 16px;
            }

            .add-contact:hover {
                text-decoration: underline;
            }

            .edit_btn {
                background-color: rgb(255, 213, 0);
                color: white;
                border: none;
                padding: 5px 10px;
                cursor: pointer;
                border-radius: 4px;
            }

            .delete_btn {
                background-color: rgb(255, 0, 0);
                color: white;
                border: none;
                padding: 5px 10px;
                cursor: pointer;
                border-radius: 4px;
            }

            .actions {
                display: flex;
                justify-content: center;
                gap: 10px;

            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>

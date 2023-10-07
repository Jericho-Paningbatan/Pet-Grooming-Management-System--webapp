<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Attendance Report</title>
    <style>
        /* Reset some default styles */
        body, h1, table {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        header {
            background-color: #007BFF;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }
        
        h1 {
            font-size: 24px;
            margin: 0;
        }

        main {
            padding: 20px;
        }

        .attendance-table {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
            width:100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 12px 15px;
            text-align: left;
        }

        table th {
            background-color: #007BFF;
            color: #fff;
        }

        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tbody tr:hover {
            background-color: #e0e0e0;
        }

    

        .filter-container {
            margin-bottom: 20px;
        }

        .filter-container label {
            font-size: 15px;
        }

        .filter-container select,
        .filter-container input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .filter-container select {
            background-color: #fff;
        }

        .filter-container input[type="date"] {
            background-color: transparent;
        }

        .search-button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            cursor: pointer;
            margin-bottom:25px;
        }

        .search-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>Attendance Report</h1>
    </header>
    <main>
        <div class="filter-container">
            <label for="employee-name">Select Employee:</label>
            <select id="employee-name">
                <option value="john-doe">John Doe</option>
                <option value="jane-smith">Jane Smith</option>
                <!-- Add more options for additional employees -->
            </select>
            
            <label for="attendance-date">Select Date:</label>
            <input type="date" id="attendance-date" style="width: 95%;">
            
            <button class="search-button" style="width: 20%; background-color: green;">Search</button>
        </div>
        <div class="attendance-table">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Employee Name</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2023-10-04</td>
                        <td>John Doe</td>
                        <td>08:30 AM</td>
                        <td>05:00 PM</td>
                        
                    </tr>
                    <tr>
                        <td>2023-10-03</td>
                        <td>Jane Smith</td>
                        <td>09:00 AM</td>
                        <td>04:45 PM</td>
                      
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>

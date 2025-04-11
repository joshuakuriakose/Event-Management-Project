<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Quicksand', sans-serif;
        }

        body {
            background: url('image3.jpg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 2rem;
        }

        .header {
            text-align: center;
            font-size: 3rem;
            font-weight: 800;
            color: white;
            text-shadow: 
                -1px -1px 0 black,  
                1px -1px 0 black,  
                -1px 1px 0 black,  
                1px 1px 0 black;
            margin-bottom: 1rem;
        }

        .home-btn {
            background: linear-gradient(135deg, #42a5f5, #1e88e5);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1.2rem;
            font-weight: 700;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.3);
            margin-bottom: 2rem;
        }

        .home-btn:hover {
            background: linear-gradient(135deg, #1e88e5, #42a5f5);
            transform: scale(1.05);
        }

        .content-container {
    background: rgba(255, 255, 255, 0.9);
    padding: 3rem; /* Increased padding for more space */
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    width: 90%; /* Increased width */
    max-width: 1200px; /* Increased max-width */
    min-height: 500px; /* Increased min-height for larger height */
    overflow: hidden;
}



        .bookings-container {
            max-width: 100%;
            max-height: 400px; /* Adjust this value as needed */
            overflow-y: auto; /* Enable scrolling */
            -ms-overflow-style: none; /* Hide scrollbar in IE/Edge */
            scrollbar-width: none; /* Hide scrollbar in Firefox */
        }

        .bookings-container::-webkit-scrollbar {
            display: none; /* Hide scrollbar in Chrome/Safari/Opera */
        }

        .booking-card {
            background: #fff;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .booking-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .cancel-btn {
            background: linear-gradient(135deg, #ff6b6b, #ee5253);
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .cancel-btn:hover {
            background: linear-gradient(135deg, #ee5253, #ff6b6b);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(238, 82, 83, 0.3);
        }

        .status-confirmed { color: #2ecc71; }
        .status-pending { color: #f1c40f; }
        .status-cancelled { color: #e74c3c; }

        .no-bookings {
            text-align: center;
            color: #666;
            font-size: 1.2rem;
            margin-top: 2rem;
        }

        @media (max-width: 768px) {
            .content-container {
                width: 90%;
                padding: 1.5rem;
            }

            .header {
                font-size: 2.5rem;
            }

            .home-btn {
                font-size: 1rem;
                padding: 0.8rem 1.5rem;
            }
        }
    </style>
</head>
<body>
    <h2 class="header">YOUR BOOKINGS</h2>
    
    <a href="home.php" class="home-btn">Home</a>

    <div class="content-container">
        <div class="bookings-container">
            <div id="bookings-list">
                <!-- Bookings will be loaded here dynamically -->
            </div>
        </div>
    </div>

    <script>
        function cancelBooking(bookingId) {
            if (confirm('Are you sure you want to cancel this booking?')) {
                fetch('viewbookings_process.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'booking_id=' + bookingId + '&action=cancel'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Error cancelling booking');
                    }
                });
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            fetch('viewbookings_process.php')
                .then(response => response.text())
                .then(html => {
                    document.getElementById('bookings-list').innerHTML = html;
                });
        });
    </script>
</body>
</html>
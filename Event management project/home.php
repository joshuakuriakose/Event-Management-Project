<?php
session_start(); // Move session_start() to the very top of the file
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Event Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Quicksand', sans-serif;
        }

        body {
            display: flex;
            height: 100vh;
            overflow: hidden;
            background: black;
        }

        .left-section {
            flex: 1.2;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 0;
            width: 100%;
            height: 100vh;
        }

        .left-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: url('image2.png') no-repeat center center fixed;
            background-size: cover;
            filter: blur(6px);
            z-index: -1;
        }

        .right-section {
            flex: 0.8;
            display: flex;
            flex-direction: column;
            background: rgba(255, 255, 255, 1);
            padding: 2rem;
            height: 100vh;
            overflow-y: auto;
            box-shadow: none;
        }

        .header {
            font-size: 5rem;
            font-weight: bold;
            color: white;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .intro {
            font-size: 1.8rem;
            color: white;
            max-width: 500px;
            line-height: 1.5;
            position: relative;
            z-index: 1;
        }

        .events-container {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            overflow-y: auto;
            max-height: 100%;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .events-container::-webkit-scrollbar {
            display: none;
        }

        .event-card {
            background: #fff;
            padding: 1.5rem;
            border-radius: 0px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            display: flex;
            flex-direction: column;
        }

        .event-card h3 {
            font-size: 1.8rem;
            color:rgb(73, 5, 125);
            margin-bottom: 1rem;
        }

        .event-card form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .event-card input {
            padding: 0.8rem;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .event-card button {
            background: #4fc3f7;
            color: white;
            padding: 1rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            margin-top: auto;
            transition: 0.4s ease-in-out;
            background-size: 200%;
            background-image: linear-gradient(to right, rgb(73, 5, 125), #002236);
        }

        .event-card button:hover {
            background-position: -100% 0;
            box-shadow: 0 4px 15px rgb(73, 5, 125);
            transform: scale(1.05);
        }

        .logout-btn {
            position: relative;
            display: inline-block;
            align-self: flex-end;
            background: #ff6b6b;
            padding: 0.8rem 1rem;
            font-size: 0.9rem;
            border-radius: 15px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .logout-btn:hover {
            background: #ee5253;
            box-shadow: 0 2px 5px #ee5253;
        }

        .right-section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 1rem;
            border-bottom: 1px solid #ddd;
            margin-bottom: 1rem;
        }

        .username-display {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
        }

        .bookings-link {
            background-image: linear-gradient(to right, rgb(73, 5, 125), #002236);
            padding: 0.8rem 1rem;
            font-size: 0.9rem;
            border-radius: 15px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.3s ease;
            margin-right: 1rem;
        }

        .bookings-link:hover {
            background-position: -100% 0;
            box-shadow: 0 4px 15px rgb(73, 5, 125);
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }

            .left-section {
                height: 30vh;
            }

            .right-section {
                height: 70vh;
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="left-section">
        <div class="header">Events</div>
        <p class="intro">
            Welcome to our event management platform! We help you plan and organize your special occasions effortlessly. Choose your event type, specify your details, and let us take care of the rest.
        </p>
    </div>

    <div class="right-section">
        <div class="right-section-header">
            <div>
                <a href="viewbookings.php" class="bookings-link">View My Bookings</a>
                <a href="login.php" class="logout-btn">Logout</a>
            </div>
        </div>
        <div class="events-container">
            <div class="event-card">
                <h3>Birthday</h3>
                <form action="home_process.php" method="POST">
                    <input type="hidden" name="event_type" value="Birthday">
                    <label>Event Date</label>
                    <input type="date" name="event_date" required />
                    <label>Guest Count</label>
                    <input type="number" name="guest_count" min="1" required />
                    <label>Budget</label>
                    <input type="number" name="budget" readonly />
                    <button type="submit">Save Event</button>
                </form>
            </div>

            <div class="event-card">
                <h3>Wedding</h3>
                <form action="home_process.php" method="POST">
                    <input type="hidden" name="event_type" value="Wedding">
                    <label>Event Date</label>
                    <input type="date" name="event_date" required />
                    <label>Guest Count</label>
                    <input type="number" name="guest_count" min="1" required />
                    <label>Budget</label>
                    <input type="number" name="budget" readonly />
                    <button type="submit">Save Event</button>
                </form>
            </div>

            <div class="event-card">
                <h3>Funeral</h3>
                <form action="home_process.php" method="POST">
                    <input type="hidden" name="event_type" value="Funeral">
                    <label>Event Date</label>
                    <input type="date" name="event_date" required />
                    <label>Guest Count</label>
                    <input type="number" name="guest_count" min="1" required />
                    <label>Budget</label>
                    <input type="number" name="budget" readonly />
                    <button type="submit">Save Event</button>
                </form>
            </div>

            <div class="event-card">
                <h3>Anniversary</h3>
                <form action="home_process.php" method="POST">
                    <input type="hidden" name="event_type" value="Anniversary">
                    <label>Event Date</label>
                    <input type="date" name="event_date" required />
                    <label>Guest Count</label>
                    <input type="number" name="guest_count" min="1" required />
                    <label>Budget</label>
                    <input type="number" name="budget" readonly />
                    <button type="submit">Save Event</button>
                </form>
            </div>

            <div class="event-card">
                <h3>Corporate Event</h3>
                <form action="home_process.php" method="POST">
                    <input type="hidden" name="event_type" value="Corporate Event">
                    <label>Event Date</label>
                    <input type="date" name="event_date" required />
                    <label>Guest Count</label>
                    <input type="number" name="guest_count" min="1" required />
                    <label>Budget</label>
                    <input type="number" name="budget" readonly />
                    <button type="submit">Save Event</button>
                </form>
            </div>

            <div class="event-card">
                <h3>Baptism</h3>
                <form action="home_process.php" method="POST">
                    <input type="hidden" name="event_type" value="Baptism">
                    <label>Event Date</label>
                    <input type="date" name="event_date" required />
                    <label>Guest Count</label>
                    <input type="number" name="guest_count" min="1" required />
                    <label>Budget</label>
                    <input type="number" name="budget" readonly />
                    <button type="submit">Save Event</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const today = new Date();
            const nextWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() + 7);
            const formattedDate = nextWeek.toISOString().split('T')[0];

            const dateInputs = document.querySelectorAll('input[type="date"]');
            dateInputs.forEach(input => {
                input.setAttribute('min', formattedDate);
            });

            document.querySelectorAll('input[name="guest_count"]').forEach(input => {
                input.addEventListener('input', function () {
                    const eventCard = input.closest('.event-card');
                    const eventType = eventCard.querySelector('h3').textContent;
                    let costPerGuest;

                    switch (eventType) {
                        case 'Birthday':
                            costPerGuest = 10;
                            break;
                        case 'Wedding':
                            costPerGuest = 50;
                            break;
                        case 'Funeral':
                            costPerGuest = 30;
                            break;
                        case 'Anniversary':
                            costPerGuest = 40;
                            break;
                        case 'Corporate Event':
                            costPerGuest = 60;
                            break;
                        case 'Baptism':
                            costPerGuest = 25;
                            break;
                        default:
                            costPerGuest = 20;
                    }

                    const guestCount = parseInt(input.value, 10) || 0;
                    const totalCost = guestCount * costPerGuest;
                    const budgetInput = eventCard.querySelector('input[name="budget"]');
                    budgetInput.value = totalCost.toFixed(2);
                });
            });
        });
    </script>
</body>
</html>
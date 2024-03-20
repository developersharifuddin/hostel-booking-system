<!DOCTYPE html>
<html>
<head>
    <title>Reservation Confirmation</title>
</head>
<body>
    Hello {{ $booking->user->username ?? "User" }},

    <p>Your reservation has been confirmed.</p>

    <p>Hostel: {{ $booking->hostel->name }}</p>
    <p>Room Type: {{ $booking->room_type }}</p>
    <p>Check-in Date: {{ $booking->check_in_date }}</p>
    <p>Check-out Date: {{ $booking->check_out_date }}</p>
    <p>Number of Occupants: {{ $booking->occupants }}</p>

    <p>Thank you for choosing our hostel!</p>

    <p>Best Regards,<br>Hostel Management Team</p>
</body>
</html>

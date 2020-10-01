<!DOCTYPE html>
<html lang="en">
<?php require_once("include/head.html")?>

<body>
    <?php 
        require_once("include/header.php");
        require_once("include/modal.php");
    ?>
    <section class="form-booking">
        <form action="" method="post" class="main-form">
            <div class="trip-type">
                <div class="singleTrip">
                        <input type="radio" name="single" id="single" value="single">
                        <label for="single">Single Destination</label>
                </div>
                <div class="mutipleTrip">
                    <input type="radio" name="single" id="mutiple" value="multiple">
                    <label for="multiple">Multiple Destinations</label>
                </div>
            </div>

            <div class="locations form-group">
                <p>
                    <label for="from">From</label>
                    <input type="text" name="from" id="from" placeholder="Enter a location" value=""></input>
                </p>
                <p>
                    <label for="to">To</label>
                    <input type="text" name="to" id="to" placeholder="Enter a location"></input>
                </p>
                <p>
                    <label for="pickup">Pickup Point</label>
                    <input type="text" name="pickup" id="pickup"></input>
                </p>
            </div>
            <div class="dates form-group">
                    <p>
                        <label for="arrivalDate">Date of Arrival</label> <br>
                        <input type="date" name="arrivalDate" id="arrivalDate">
                    </p>
                    <p>
                        <label for="departureDate">Date of Departure</label><br>
                        <input type="date" name="departureDate" id="departureDate">
                    </p>
                   
            </div>
            <div class="passangers form-group">
                <p>
                    <label for="adults">Adults</label>
                    <input type="number" name="adults" id="adults">
                </p>
                <p>
                    <label for="children">Children</label>
                    <input type="number" name="children" id="children">
                </p>

            </div><br>
            <input type="submit" name="submit" class="submit" value="Start Booking">
        </form>
    </section>
    <script>
        function activatePlacesSearch(){
            var origin =document.getElementById('from');
            var destination =document.getElementById('to');
            var options={
                types:['address'],
                componentRestrictions: {country: 'za'}
            };
            var autocomplete= new google.maps.places.Autocomplete(origin,options);
            var autocomplete2= new google.maps.places.Autocomplete(destination,options);
        }
    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPhl_aevmtn1YfonMo1QU38Q4kJO8ZwLg&libraries=places&callback=activatePlacesSearch"></script>
</body>
</html>



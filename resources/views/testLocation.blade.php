<!DOCTYPE html>
<html>
@include('includes.head')
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<body>
  <div class="container">
    <h2>Submit Incident</h2>
    <form method="POST" action="{{ route('testLocation.store') }}">
      @csrf
      <!-- naam sodhni -->
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <!-- incident sodhni -->
      <div class="form-group">
        <label for="incident">Incident:</label>
        <textarea class="form-control" id="incident" name="incident" rows="5" required></textarea>
      </div>
      <!-- location ni sodhni -->
      <div class="form-group">
        <label for="location">Location:</label>
        <input type="text" class="form-control" id="location" name="location">
      </div><br>
      <button type="submit" class="btn btn-primary">Submit</button>

      <br><br><br>
      <!-- user ko ip address ra location -->
      <div class="border border-primary p-3 my-5">
        <h4>Received users location and ip address and latitude and longitude </h4>
        <div class="form-group">
          <label for="ipAddress">IP Address:</label>
          <input type="text" class="form-control" id="ipAddress" name="ipAddress" value="{{ session('ipAddress') }}"
            readonly>
        </div>
        <div class="form-group">
          <label for="location">Location:</label>
          <input type="text" class="form-control" id="location" name="location" value="{{ session('locationName') }}"
            readonly>
        </div>
        <div class="form-group">
          <label for="latitude">latitude:</label>
          <input type="text" class="form-control" id="latitude" name="latitude" value="{{ session('latitude') }}"
            readonly>
        </div>
        <div class="form-group">
          <label for="longitude">longitude:</label>
          <input type="text" class="form-control" id="longitude" name="longitude" value="{{ session('longitude') }}"
            readonly>
        </div>
      </div>
      <!-- user ko ip address ra location -->
    </form>

    <!-- Maps -->
    <div class="mt-4">
      <h3>Location Map</h3>

      <div>
  <h5>OpenStreetMap</h5>
  <iframe
    width="600"
    height="450"
    frameborder="0"
    scrolling="no"
    marginheight="0"
    marginwidth="0"
    src="https://www.openstreetmap.org/export/embed.html?bbox={{ session('longitude') - 0.01 }},{{ session('latitude') - 0.01 }},{{ session('longitude') + 0.01 }},{{ session('latitude') + 0.01 }}&layer=mapnik&marker={{ session('latitude') }},{{ session('longitude') }}"
  ></iframe>
</div>


    </div> <!-- maps -->

  </div> <!-- mainContainer -->
</body>

</html>
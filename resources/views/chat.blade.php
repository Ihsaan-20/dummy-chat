<!doctype html>
<html lang="en">

<head>
  <title>Chat App</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <h1 class="text-center">Chat Application</h1>
                <form action="" id="messageForm">
                    @csrf
                    <input type="text" name="message" id="message" placeholder="send your message" class="form-control mb-2">
                    <button type="submit" class="btn btn-success">send</button>
                </form>
            </div>
        </div>
    </div>

    <div id="chatMessages"></div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script>
    // Assume you have a form with id="messageForm" and a div with id="chatMessages"
$('#messageForm').submit(function (e) {
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: '/send-message',
        data: $(this).serialize(),
        success: function (response) {
            console.log(response);
            // Handle success, update chatMessages div, etc.
        }
    });
});

// You can also use setInterval to periodically fetch new messages
// setInterval(function () {
//     $.ajax({
//         type: 'GET',
//         url: '/fetch-messages',
//         success: function (response) {
//             // Update chatMessages div with new messages
//         }
//     });
// }, 5000); // Repeat every 5 seconds (adjust as needed)

  </script>
  <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  </script>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
  </script>
</body>

</html>

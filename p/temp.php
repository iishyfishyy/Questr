<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Site Title</title>
</head>
<body>

  <!-- Add an optional button to open the popup -->
  <button class="pop_open">Open popup</button>

  <!-- Add content to the popup -->
  <div id="posap">

    ...popup content...

    <!-- Add an optional button to close the popup -->
    <button class="pop_close">Close</button>

  </div>

  <!-- Include jQuery -->
  <script src="https://code.jquery.com/jquery-1.8.2.min.js"></script>

  <!-- Include jQuery Popup Overlay -->
  <script src="https://cdn.rawgit.com/vast-engineering/jquery-popup-overlay/1.7.10/jquery.popupoverlay.js"></script>

  <script>
    $(document).ready(function() {

      // Initialize the plugin
      $('#posap').popup();

    });
  </script>

</body>
</html>
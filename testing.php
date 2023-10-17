<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .faded-gradient {
      width: 200px;
      height: 100px;
      background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(255, 255, 255, 1));
      position: relative;
    }

    .faded-gradient::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 50%; /* Adjust the width based on how much of the element you want to fade */
      height: 100%;
      background: linear-gradient(to right, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0));
    }
  </style>
  <title>Gradual Fade</title>
</head>
<body>
  <div class="faded-gradient">This is an element with a gradual fade on the left side.</div>
</body>
</html>

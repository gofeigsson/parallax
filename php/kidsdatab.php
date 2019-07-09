<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kids Club</title>
<!--Google fonts link-->
<link href="https://fonts.googleapis.com/css?family=Londrina+Solid:400|Roboto:300,400,900&dis &display=swap" rel="stylesheet"> 
<!--bootstrap CSS-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!--CSS stylesheet -->    
<link rel="stylesheet" type="text/css" href="../css/kidsdatab.css">   
</head>
<!--tracking for scroll-->
<body data-spy="scroll" data-target="#myScrollspy" data-offset="1">
<!--wrapper for whole content-->
<div id="wrapper">
<!--navigation-->    
<div class="row">
  <nav id="myScrollspy">
    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link active" href="#one">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#two">What's on</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#four">8-Bit Kids</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#six">Sign up</a>
      </li>
    </ul>
  </nav>
</div>
<!--wraps around divs-->    
<div class="content">
<!--div 1 is landing page--> 
<div id="one">
  <div id="clublogo"></div>
  <div id="logo"></div>
</div>
<!--div 2 is what's on-->
<div id="two">
  <div class="chapter">Upcoming Events</div>      
<!--event-->
  <?php
  require('../includes/dbconx.php');
// Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
//statement
  $sql = "SELECT category, title, date, dateorder, price, photo, about FROM whatson ORDER BY dateorder asc; ";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
// output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<div class="infobox">' . "<h6>" . $row["category"] . "</h6>" . "<br>" . "<h3>" . $row["title"] . "</h3>" . "<br>" . "<h5>" . $row["date"] . "</h5>" . "<br>" . "<h6>" . $row["price"] . "</h6>" . "<br>" . '<img src="' . $row["photo"] . '">' . "<br>" . '<div id="imgpad">' . "<p>" . $row["about"] . "</p>" . "</div>" . "</div>";
}
} else {
    echo "sorry there seems to be a problem!";
}
$conn->close();
?>   
<!--div 2 ends-->
</div>        
<div id="three"></div>
<div id="four"> 
<div id="pinkone"></div>
<div id="pinktwo"></div>   
<!--8 bit kids-->
<div class="frames"> 
<div class="chapter">8-Bit Kids</div>
<h5>Next Meeting 20.08.19</h5><br>
<h5>Game: Snake</h5><br>
<div id="snake"><img src="../images/snake.jpg"></div> 
<br> 
<p>The Snake design dates back to the arcade game Blockade, developed and published by Gremlin in 1976. In 1977, Atari released two Blockade-inspired titles: the arcade game Dominos and Atari VCS game Surround. Surround was one of the nine Atari VCS launch titles in the United States and was also sold by Sears under the name Chase. That same year, a similar game was launched for the Bally Astrocade as Checkmate.
<br><br>
The first known personal computer version, titled Worm, was programmed in 1978 by Peter Trefonas of the US on the TRS-80, and published by CLOAD magazine in the same year. This was followed shortly afterwards with versions from the same author for the Commodore PET and Apple II. A microcomputer clone of the Hustle arcade game, itself a clone of Blockade, was written by Peter Trefonas in 1979 and published by CLOAD. An authorized version of Hustle was published by Milton Bradley for the TI-99/4A in 1980. In 1982's Snake for the BBC Micro, by Dave Bresnen, the snake is controlled using the left and right arrow keys relative to the direction it is heading in. 
<br><br>
The snake increases in speed as it gets longer, and there's only one life; one mistake means starting from the beginning.</p><br>
<!--Snake-->
<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#snake8b">
Play Snake</button>
</div>
<!-- Modal -->
<div class="modal fade" id="snake8b" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Snake</h5>
        <button type="button" class="close" data-dismiss="modal">
        </button>
      </div>
      <div class="modal-body">
<!--snake example-->
<style>
canvas {
    border: 1px solid black;
  }
  </style>
<canvas width="400" height="400" id="game"></canvas>
<script>
var canvas = document.getElementById('game');
var context = canvas.getContext('2d');
var grid = 16;
var count = 0;
var snake = {
  x: 160,
  y: 160,
  // snake velocity. moves one grid length every frame in either the x or y direction
  dx: grid,
  dy: 0,
  // keep track of all grids the snake body occupies
  cells: [],
  // length of the snake. grows when eating an apple
  maxCells: 4
};
var apple = {
  x: 320,
  y: 320
};
// get random whole numbers in a specific range
// @see https://stackoverflow.com/a/1527820/2124254
function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min)) + min;
}
// game loop
function loop() {
  requestAnimationFrame(loop);
  // slow game loop to 15 fps instead of 60 (60/15 = 4)
  if (++count < 4) {
    return;
  }
  count = 0;
  context.clearRect(0,0,canvas.width,canvas.height);
  // move snake by it's velocity
  snake.x += snake.dx;
  snake.y += snake.dy;
  // wrap snake position horizontally on edge of screen
  if (snake.x < 0) {
    snake.x = canvas.width - grid;
  }
  else if (snake.x >= canvas.width) {
    snake.x = 0;
  }
  // wrap snake position vertically on edge of screen
  if (snake.y < 0) {
    snake.y = canvas.height - grid;
  }
  else if (snake.y >= canvas.height) {
    snake.y = 0;
  }
  // keep track of where snake has been. front of the array is always the head
  snake.cells.unshift({x: snake.x, y: snake.y});
  // remove cells as we move away from them
  if (snake.cells.length > snake.maxCells) {
    snake.cells.pop();
  }
  // draw apple
  context.fillStyle = 'red';
  context.fillRect(apple.x, apple.y, grid-1, grid-1);
  // draw snake one cell at a time
  context.fillStyle = 'green';
  snake.cells.forEach(function(cell, index) {
  // drawing 1 px smaller than the grid creates a grid effect in the snake body so you can see how long it is
    context.fillRect(cell.x, cell.y, grid-1, grid-1);  
  // snake ate apple
    if (cell.x === apple.x && cell.y === apple.y) {
      snake.maxCells++;
  // canvas is 400x400 which is 25x25 grids 
      apple.x = getRandomInt(0, 25) * grid;
      apple.y = getRandomInt(0, 25) * grid;
    }
  // check collision with all cells after this one (modified bubble sort)
    for (var i = index + 1; i < snake.cells.length; i++) {
  // snake occupies same space as a body part. reset game
      if (cell.x === snake.cells[i].x && cell.y === snake.cells[i].y) {
        snake.x = 160;
        snake.y = 160;
        snake.cells = [];
        snake.maxCells = 4;
        snake.dx = grid;
        snake.dy = 0;
        apple.x = getRandomInt(0, 25) * grid;
        apple.y = getRandomInt(0, 25) * grid;
      }
    }
  });
}
// listen to keyboard events to move the snake
document.addEventListener('keydown', function(e) {
  // prevent snake from backtracking on itself by checking that it's 
  // not already moving on the same axis (pressing left while moving
  // left won't do anything, and pressing right while moving left
  // shouldn't let you collide with your own body)
  // left arrow key
  if (e.which === 37 && snake.dx === 0) {
    snake.dx = -grid;
    snake.dy = 0;
  }
  // up arrow key
  else if (e.which === 38 && snake.dy === 0) {
    snake.dy = -grid;
    snake.dx = 0;
  }
  // right arrow key
  else if (e.which === 39 && snake.dx === 0) {
    snake.dx = grid;
    snake.dy = 0;
  }
  // down arrow key
  else if (e.which === 40 && snake.dy === 0) {
    snake.dy = grid;
    snake.dx = 0;
  }
});
// start the game
requestAnimationFrame(loop);
</script>
<!--modal body ends-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--div four ends-->
</div>
<div id="five"></div>     
<div id="six">
<!--pink blocks-->  
<div id="pinkthree"></div>
<div id="pinkfour"></div>  
<div class="frames">
<div class="chapter">Sign Up Here for the Art Club!</div>
<div id="form">
<form action="kidssignup.php" method="post" name="signup">
    <div class="input form-group mr-2 mb-2">
    <input type="text" name="firstname" class="form-control" placeholder="Firstname" required></div>
    <div class="input form-group mr-2 mb-2">
    <input type="text" name="lastname" class="form-control" placeholder="Lastname" required></div>
    <div class="input form-group mr-2 mb-2">
    <input type="email" name="email" class="form-control" placeholder="Email" required></div>
    <div class="input form-group mr-2 mb-2">
    <input type="text" name="address" class="form-control" placeholder="Address" required></div>
    <div class="input form-group mr-2 mb-2">
    <input type="text" name="postcode" class="form-control" placeholder="Postcode" required></div>
    <div class="input form-group mr-2 mb-2">
    <input type="text" name="city" class="form-control" placeholder="City" required></div>
    <div class="input form-group mr-2 mb-2">
    <button class="btn btn-success mt-5 mb-5" name="submit" type="submit" id="button-addon2">Register</button></div>
</form>
</div> 
<!--button for admin section--> 
<div id="admin">
  <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#collapseExample">
  Admin Login</button>
<div class="collapse m-2" id="collapseExample">
  <div class="card card-body">
  <form action="admin.php" method="post" name="login" class="form-inline">
    <div class="input form-group mr-2 mb-2">
    <input type="text" name="username" class="form-control" placeholder="Username: admin" required></div>
    <div class="input form-group mr-2 mb-2">
    <input type="text" name="password" class="form-control" placeholder="Password: admin" required></div>
    <div class="input form-group mr-2 mb-2">
    <button class="btn btn-dark" name="submit" type="submit" id="button-addon2">Admin Log In</button></div>
</form>
  </div>
</div>
</div>
<div>
<!--div 6 ends-->
</div>
<!--content ends-->    
</div>
<!--wrapper ends--> 
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="../javascript/exhibit.js"></script> 
</body>
</html>
<?php include_once 'dbfun.php'; ?>
<?php include_once 'newheader.php';?>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
/* About Us */

.contain {
  position: relative;
  width: 100%;
  height: 500px;
  overflow: hidden; /* To hide any content that might overflow from the container */
  /* background: linear-gradient(rgba(29,38,113,0.8),rgba(195,55,100,0.8)),url("https://bit.ly/2rlzaXi"); */
  background-color:black;
  }
.background-img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height:100%;
  object-fit: cover; /* This property ensures the image covers the entire container */
  filter: blur(4px); /* Apply blur effect only to the background image */
}

.overlay-text {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
  font-size: 38px;
  font-weight: bold;
  text-align: center;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Adding a shadow effect for better readability */
}
.aboutus_box {
  width: 80%; /* Adjust width as needed */
  height: 390px; /* Adjust height as needed */
  margin: 0 auto; /* 80px left and right margin */
  /* background-color: #f0f0f0;  */
  border-radius: 10px; /* Border radius for rounded corners */
  /* box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; */
  box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
  /* box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px; */
  word-wrap: break-word;
  padding: 30px;
  line-height: 30px;
  font-size: 17px;
  font-weight:500;
  font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}
.three_boxes{
/* height:450px; */
width: 350px;
/* background-color: #ccc; */
box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
border-radius: 8px;
padding: 20px;

}
.three_boxes_container{
display: flex;
justify-content: space-between;
text-align: center;
}
.margin_aboutus{
margin:0 80px;
}
.fa-users, .fa-film,.fa-calendar-days{
font-size: 35px;
color: rgb(255, 0, 98);;

}
.three_boxes_container p{
line-height: 25px;
font-size: 17px;
}
.fa-circle-play{
color: rgb(255, 0, 98);;
}
.heading{
    text-align: center;
}

</style>
<body style="color:black";>
<div class="contain" style="width=100%;">
    <img class="background-img" src="bg.jpg" alt="Background Image">
    <div class="overlay-text"><span><i class="fa-solid fa-circle-play"></i>CineTicket
    <br><br><span>Every Ticket , a Different Journey</span></div>
    
</div>
<br>
<h1 class="heading">About Us</h1><br>

<div class="aboutus_box" style=" height: 490px;">
&nbsp;&nbsp;&nbsp;&nbsp;Welcome to <i class="fa-solid fa-circle-play"></i><span style="color:  rgb(255, 0, 98); font-weight: bold;"> </span><span style="color:rgb(255, 0, 98);">CineTicket</span
>, your premier destination for seamless online movie ticket booking. At CineTicket, we're passionate about bringing the magic of the big screen directly to your fingertips. Whether you're a cinema enthusiast, a casual moviegoer, or simply looking for a fun night out, we've got you covered.
Our mission at CineTicket is to revolutionize the way you experience movies. With our intuitive platform, you can browse showtimes, reserve seats, and purchase tickets with ease, all from the comfort of your own home or on the go. Say goodbye to long lines and sold-out screenings – with CineTicket, your movie night starts the moment you visit our site.
We pride ourselves on offering a vast selection of theaters, films, and showtimes to cater to every taste and preference. From the latest blockbusters to indie gems and everything in between, we're committed to providing you with a diverse array of options to make your moviegoing experience unforgettable.
At CineTicket, we prioritize convenience, reliability, and customer satisfaction above all else. That's why we work tirelessly to ensure that our platform is user-friendly, secure, and always up-to-date. Your enjoyment and peace of mind are our top priorities, and we'll stop at nothing to exceed your expectations.
Join the millions of movie lovers who trust CineTicket to enhance their cinematic adventures. Whether you're flying solo, planning a date night, or organizing a group outing, we're here to make your movie dreams a reality. Start exploring today and let us help you create memories that last a lifetime.
<br>Thank you for choosing CineTicket. Lights, camera, action 🎬– let's make some movie magic together!
</div>
<br><br>
<h1 class="heading">Why to choose us?</h1><br>
<br><br>
<div class="three_boxes_container">
<div class="three_boxes margin_aboutus" style="height:480px;">
  <i class="fa-solid fa-users"></i><br><br>
  <h3>Seamless User Experience</h3><br><p> Our website offers an intuitive and user-friendly interface, making it effortless for customers to browse, select, and book movie tickets online. From easy navigation to a streamlined booking process, we prioritize a seamless experience for every user.</p></div>
<div class="three_boxes"style="height:480px;">
  <i class="fa-solid fa-film" ></i><br><br>
<h3>Extensive Movie Selection</h3><br><p> With a vast array of movies across genres, languages, and release dates, our website ensures that there's something for every moviegoer. Whether it's the latest blockbusters, indie films, or timeless classics, customers can find and book tickets for their preferred movies hassle-free.</p>
</div>
<div class="three_boxes margin_aboutus"style="height:480px;">
  <i class="fa-solid fa-calendar-days"></i><br><br>
 <h3> Convenient Booking Options</h3><br> <p>We provide flexible booking options, allowing customers to reserve their seats in advance, choose their preferred showtimes, and select their preferred seating arrangements. Whether booking solo or as a group, our website caters to diverse preferences, ensuring a convenient and enjoyable movie-going experience for all.</p>
</div>
</div>
<br><br>

<?php
  include_once('newfooter.php');
  ?>
</body>
</html>

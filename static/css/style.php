<?php
  header("content-type: text/css");
  $primary_color = '#FFFFFF';
  $secondary_color = '#1B1F3B';
  $tertiary_color = '#454ADE';
  $light_text = "#F2F2F2";
  $theme_text = "#AAA";
  $dark_text = '#1E1E1E';
  $theme_border = '#4d4d4d';
?>
@font-face {
  src: url('../fonts/Exo2-Regular.ttf');
  font-family: 'Exo 2';
}
@font-face {
  src: url('../fonts/Pacifico-Regular.ttf');
  font-family: Pacifico;
}
* {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
html,
ul,
table,
h1,
h2,
h3,
h4,
h5,
h6,
p,
body {
  margin: 0;
  padding: 0;
}
body {
  font-family: 'Exo 2', sans-serif;
  overflow: hidden;
}
div,
header,
footer,
aside,
article,
nav {
  position: relative;
}
img {
  display: block;
  max-width: 100%;
}
.show-block {
  display: block;
}
.show-inline-block {
  display: inline-block;
}
.show-table {
  display: table;
}
.hide {
  display: none;
}
.visually-hide {
  opacity: 0;
}
header {
  position: relative;
  width: 100%;
  float: left;
  height: auto;
  border-bottom: 2px solid <?php echo $secondary_color?>;
  background: <?php echo $tertiary_color?>;
}
header h1 {
  font-family: 'Pacifico', cursive;
  color: white;
  padding: 5px 50px;
  text-align: left;
}
aside {
  position: relative;
  width: 20%;
  height: 602px;
  overflow: auto;
  float: left;
  color: <?php echo $light_text?>;
  background: <?php echo $secondary_color?>;
}
aside form {
  width: 100%;
  margin-top: 20px;
}
aside form ul {
  width: 100%;
  list-style-type: none;
}
aside form ul li {
  color: inherit;
  margin: 20px 10px 0 10px;
  padding: 5px;
  border: 1px solid <?php echo $tertiary_color?>;
}
aside form ul li label,
aside form ul li input[type="submit"] {
  display: block;
  text-align: center;
  padding: 10px;
  margin: -5px -5px 0px -5px;
  font-size: 14px;
  background: <?php echo $tertiary_color?>;
}
aside form ul li input[type="submit"]{
  margin: 0 0 0 0;
  border-bottom: none;
  color: white;
  cursor: pointer;
  background: <?php echo $secondary_color?>;
}
aside form ul li input[type="submit"]:hover {
  background: <?php echo $tertiary_color?>;
}
aside form ul li input:focus,
aside form ul li select:focus {
 outline: none;
}
aside form ul li input,
aside form ul li select {
  display: block;
  width: 100%;
  background: <?php echo $secondary_color?>;
  color: <?php echo $theme_text?>;
  padding: 10px;
  border: 0px solid white;
}
aside form ul li select {
  -moz-appearance: none;
  margin-top: 3px;
  border: 0px solid white;
}
aside form ul li input {
  padding-bottom: 13px;
  padding-top: 13px;
  border-bottom: 1px solid <?php echo $theme_border?>;
}
section {
  position: relative;
  width: 80%;
  height: 602px;
  float: left;
  overflow: auto;
  background: <?php echo $primary_color?>;
}
.distance-measure {
  width: 100%;
  float: left;
  padding: 30px 50px;
  margin: 0 0;
  border-left: 2px solid <?php echo $secondary_color?>;
  border-right: 2px solid <?php echo $secondary_color?>;
  border-top: 2px solid <?php echo $secondary_color?>;
  background: <?php echo $tertiary_color?>;
}
.circle-left,
.circle-right {
  width: 5%;
  height: 50px;
  float: left;
  border-radius: 50%;
  z-index: 10;
  background: <?php echo $secondary_color?>;
}
.circle-push-left {
  left: 5px;
}
.circle-push-right {
  right: 5px;
}
.circle-cover {
  position: absolute;
  top: 8px;
  width: 70%;
  height: 70%;
  border-radius: 50%;
  background: <?php echo $primary_color?>;
  -webkit-transition: all 0.4s ease 0s;
  -moz-transition: all 0.4s ease 0s;
  -o-transition: all 0.4s ease 0s;
  -ms-transition: all 0.4s ease 0s;
  transition: all 0.4s ease 0s;
  -webkit-box-shadow: inset 0 0 10px 6px <?php echo $secondary_color?>;
  box-shadow: inset 0 0 10px 6px <?php echo $secondary_color?>;
}
.circle-cover:hover {
  -webkit-box-shadow: inset 0 0 8px 4px <?php echo $secondary_color?>;
  box-shadow: inset 0 0 8px 4px <?php echo $secondary_color?>;
}
.circle-cover-right {
 right: 7.4px;
}
.circle-cover-left {
 left: 7.4px;
}
.line {
  width: 90%;
  height: 8px;
  top: 20px;
  float: left;
  background: <?php echo $secondary_color?>;
}
.from,
.to {
  width: 30%;
  float: left;
  border: 0px solid black;
}
.distance {
  width: 40%;
  float: left;
  border: 0px solid black;
}
.from h1,
.to h1,
.distance h1 {
  padding: 10px 0 0 0;
  font-size: 18px;
  font-weight: 100;
  color: <?php echo $primary_color?>;
}
.from h1 {
  text-align: left;
  padding-left: 10px;
}
.to h1 {
  text-align: right;
  padding-right: 10px;
}
.distance h1 {
  text-align: center;
  padding: 5px 0 0 0;
}
#mapCanvas {
  width: 70%;
  float: left;
  height: 450px;
  border: 2px solid <?php echo $secondary_color?>;
}
#right-panel {
  width: 30%;
  float: left;
  height: 450px;
  overflow: auto;
  border: 2px solid <?php echo $secondary_color?>;
}
footer {
  width: 100%;
  float: left;
  background: #1e1e1e;
}
footer p {
  color: <?php echo $theme_text?>;
  text-align: center;
  padding: 10px 0 20px 0;
}
.modal-wrapper {
  position: fixed;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.7);
  -webkit-transition: all 0.4s ease 0s;
  -moz-transition: all 0.4s ease 0s;
  -o-transition: all 0.4s ease 0s;
  -ms-transition: all 0.4s ease 0s;
  transition: all 0.4s ease 0s;
}
.modal-wrapper .modal {
  display: block;
  margin: 250px auto 0 auto;
  width: 50%;
  height: auto;
  padding: 10px 0 20px 0;
  background: <?php echo $primary_color?>;
  -webkit-animation: top-in 1 1s 0s;
  animation: top-in 1 1s 0s;
}
.modal-wrapper .modal h1 {
  text-align: center;
  color: black;
  padding: 20px 10px;
}
.modal-wrapper button {
  display: block;
  margin: 0 auto 0 auto;
  background: <?php echo $tertiary_color?>;
  color: <?php echo $primary_color?>;
  border: none;
  padding: 10px 20px;
  border-radius: 8px;
  cursor: pointer;
}
.modal-wrapper button:focus {
  outline: none;
}
@-webkit-keyframes scale {
  from {
    -webkit-transform: scale(0);
    -mz-transform: scale(0);
    -o-transform: scale(0);
    -ms-transform: scale(0);
    transform: scale(0);
  }
  to {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1);
  }
}
@keyframes scale {
  from {
    -webkit-transform: scale(0);
    -mz-transform: scale(0);
    -o-transform: scale(0);
    -ms-transform: scale(0);
    transform: scale(0);
  }
  to {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1);
  }
}
@-webkit-keyframes top-in {
  0% {
    -webkit-transform: translateY(-2000px);
    -moz-transform: translateY(-2000px);
    -ms-transform: translateY(-2000px);
    -o-transform: translateY(-2000px);
    transform: translateY(-2000px);
  }
  100% {
    -webkit-transform: translateY(0);
    -moz-transform: translateY(0);
    -o-transform: translateY(0);
    -ms-transform: translateY(0);
    transform: translateY(0);
  }
}
@keyframes top-in {
  0% {
    -webkit-transform: translateY(-2000px);
    -moz-transform: translateY(-2000px);
    -ms-transform: translateY(-2000px);
    -o-transform: translateY(-2000px);
    transform: translateY(-2000px);
  }
  100% {
    -webkit-transform: translateY(0);
    -moz-transform: translateY(0);
    -o-transform: translateY(0);
    -ms-transform: translateY(0);
    transform: translateY(0);
  }
}
::-webkit-scrollbar {
  display: none;
  background: <?php echo $secondary_color?>;
  width: 12px;
}
::-webkit-scrollbar-thumb {
  background: #eee;
  border-radius: 8px;
}
.error-404-container {
  position: fixed;
  width: 100%;
  height: 100%;
  padding: 10px;
  background: <?php echo $secondary_color?>;
}
.error-404-container h1 {
  color: <?php echo $primary_color?>;
  font-size: 200px;
  text-align: center;
  margin-top: 90px;
}
.error-404-container h2 {
  color: <?php echo $primary_color?>;
  text-align: center;
  font-size: 65px;
  margin: 20px 0;
}
.error-404-container p {
  color: <?php echo $primary_color?>;
  text-align: center;
  font-size: 30px;
  margin: 40px 0 20px 0;
}
.hide-on-tablet {
  display: block;
}
@media (max-width:768px){
  body {
    overflow: auto;
  }
  section,
  aside {
    position: relative;
    height: auto;
    width: 100%;
  }
  aside {
    padding: 20px 10px 40px 10px;
  }
  #mapCanvas,
  #right-panel {
    width: 100%;
  }
  .hide-on-tablet {
    display: none;
  }
  .circle-left,
  .circle-right {
    width: 10%;
  }
  .line {
    width: 80%;
  }
  .error-404-container {
    padding: 20px 40px;
  }
  .error-404-container h1 {
    font-size: 150px;
    margin-top: 90px;
  }
  .error-404-container h2 {
    font-size: 30px;
    margin: 20px 0;
  }
  .error-404-container p {
    font-size: 20px;
    margin: 40px 0 20px 0;
  }
}
@media (max-width: 421px){
  .circle-left,
  .circle-right,
  .line {
     display: none;
  }
  .from,
  .distance,
  .to {
    width: 100%;
    padding: 0;
  }
  .from h1:before {
    content: 'From ';
  }
  .to h1:before {
    content: 'To ';
  }
  .from h1,
  .distance h1,
  .to h1 {
     padding: 5px 0;
  }
}

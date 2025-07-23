
<style>
    @import url('https://fonts.googleapis.com/css2?family=Khand:wght@500&display=swap');




.wrapperAlert {
  font-family: 'Khand', sans-serif;

  width: 35%;
  height: 400px;
  overflow: hidden;
  border-radius: 12px;
  border: thin solid #ddd;
  margin: 0 auto;

}

.topHalf {
  width: 100%;
  color: white;
  overflow: hidden;
  min-height: 250px;
  position: relative;
  padding: 40px 0;
  background: rgb(0,0,0);
  background: -webkit-linear-gradient(45deg, #019871, #a0ebcf);
  font-family: 'Khand', sans-serif;

}

.topHalf p {
  margin-bottom: 30px;
  text-align: center;
}
svg {
  fill: white;
}
svg:not(:root) {
    overflow: hidden;
    width: 25%;
}
.topHalf h1 {
  font-size: 2.25rem;
  display: block;
  font-weight: 500;
  letter-spacing: 0.15rem;
  text-shadow: 0 2px rgba(128, 128, 128, 0.6);
  text-align: center;
  color:red;
}

/* Original Author of Bubbles Animation -- https://codepen.io/Lewitje/pen/BNNJjo */
.bg-bubbles{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
}

.wrapperAlert li{
  position: absolute;
  list-style: none;
  display: block;
  width: 40px;
  height: 40px;
  background-color: rgba(255, 255, 255, 0.15);/* fade(green, 75%);*/
  bottom: -160px;

  -webkit-animation: square 20s infinite;
  animation:         square 20s infinite;

  -webkit-transition-timing-function: linear;
  transition-timing-function: linear;
}
.wrapperAlert li:nth-child(1){
  left: 10%;
}
.wrapperAlert li:nth-child(2){
  left: 20%;

  width: 80px;
  height: 80px;

  animation-delay: 2s;
  animation-duration: 17s;
}
.wrapperAlert li:nth-child(3){
  left: 25%;
  animation-delay: 4s;
}
.wrapperAlert li:nth-child(4){
  left: 40%;
  width: 60px;
  height: 60px;

  animation-duration: 22s;

  background-color: rgba(white, 0.3); /* fade(white, 25%); */
}
.wrapperAlert li:nth-child(5){
  left: 70%;
}
.wrapperAlert li:nth-child(6){
  left: 80%;
  width: 120px;
  height: 120px;

  animation-delay: 3s;
  background-color: rgba(white, 0.2); /* fade(white, 20%); */
}
.wrapperAlert li:nth-child(7){
  left: 32%;
  width: 160px;
  height: 160px;

  animation-delay: 7s;
}
.wrapperAlert li:nth-child(8){
  left: 55%;
  width: 20px;
  height: 20px;

  animation-delay: 15s;
  animation-duration: 40s;
}
.wrapperAlert li:nth-child(9){
  left: 25%;
  width: 10px;
  height: 10px;

  animation-delay: 2s;
  animation-duration: 40s;
  background-color: rgba(white, 0.3); /*fade(white, 30%);*/
}
.wrapperAlert li:nth-child(10){
  left: 90%;
  width: 160px;
  height: 160px;

  animation-delay: 11s;
}

@-webkit-keyframes square {
  0%   { transform: translateY(0); }
  100% { transform: translateY(-500px) rotate(600deg); }
}
@keyframes square {
  0%   { transform: translateY(0); }
  100% { transform: translateY(-500px) rotate(600deg); }
}

.bottomHalf {
  align-items: center;
  padding: 35px;
}
.bottomHalf p {
  font-weight: 500;
  font-size: 1.05rem;
  margin-bottom: 20px;
}

.wrapperAlert button , #try {
  border: none;
  color: white;
  cursor: pointer;
  border-radius: 12px;
  padding: 10px 18px;
  background-color: #019871;
  text-shadow: 0 1px rgba(128, 128, 128, 0.75);
}
.wrapperAlert button:hover , #try:hover {
  background-color: #85ddbf;
}
</style>


<div class="wrapperAlert">

  <div class="contentAlert">

    <div class="topHalf">

      <p><svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
  <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
  <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"/>
  <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"/>
</svg></p>
      <h1>Congratulations</h1>

     <ul class="bg-bubbles">
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
       <li></li>
     </ul>
    </div>

    <div class="bottomHalf">

      <p>Oops! Something went wrong.While trying to reserve money from your account</p>

      <a href="<?=base_url('payment/billing_address')?>" id="try">Try</a>

    </div>

  </div>

</div>

<div class="container">
           <?php $this->load->view('includes/footer'); ?>
</div>

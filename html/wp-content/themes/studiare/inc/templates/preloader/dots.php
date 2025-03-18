<?php
//hi
?>

<style>
    

.dotspreloader {
  width: 200px;
  height: 40px;
  display: flex;
  justify-content: center;
  align-items: center;

  .dot {
    width: 10px;
    height: 10px;
    border-radius: 100%;
    /*background-color: #003FBB;*/
    position: absolute;
    left: 30%;
    animation: easeInAndOut 2.5s ease infinite;

    &:nth-child(1) {
      animation-delay: 0s;
      opacity: 0;
    }
    &:nth-child(2) {
      animation-delay: 0.3s;
      opacity: 0.8;
    }
    &:nth-child(3) {
      animation-delay: 0.6s;
      opacity: 0.5;
    }
    &:nth-child(4) {
      animation-delay: 0.9s;
      opacity: 0.2;
    }
  }
}

@keyframes easeInAndOut {
  0% {
    left: 30%;
    opacity: 0;
  }
  48% {
    left: 49%;
    opacity: 1;
  }
  50% {
    left: 51%;
    opacity: 1;
  }
  100% {
    left: 70%;
    opacity: 0;
  }
}
    
</style>


<div class="dotspreloader">
  <div class="dot"></div>
  <div class="dot"></div>
  <div class="dot"></div>
  <div class="dot"></div>
</div>
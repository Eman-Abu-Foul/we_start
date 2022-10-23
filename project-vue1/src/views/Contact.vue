<template>

    <div class="contact-content-con">
        <div class="left-contact">
            <h4>Contact me here</h4>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                In, laborum numquam? Quam excepturi perspiciatis quas quasi.
            </p>
            <div class="contact-info">
                <div class="contact-item">
                    <div class="icon">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Location</span>
                    </div>
                    <p>
                        : Palestine, Gaza City
                    </p>
                </div><!-- End contact-item -->
                <div class="contact-item">
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                        <span>Email</span>
                    </div>
                    <p>
                        <span>: emanabufoul2000@gmail.com</span>
                    </p>
                </div><!-- End contact-item -->
                <div class="contact-item">
                    <div class="icon">
                        <i class="fas fa-user-graduate"></i>
                        <span>Education</span>
                    </div>
                    <p>
                        <span>:AL-AQSA University </span>
                    </p>
                </div><!-- End contact-item -->
                <div class="contact-item">
                    <div class="icon">
                        <i class="fas fa-phone-alt"></i>
                        <span>Mobile Number</span>
                    </div>
                    <p>
                        <span>: +970594420151</span>
                    </p>
                </div><!-- End contact-item -->
                <div class="contact-item">
                    <div class="icon">
                        <i class="fas fa-globe-africa"></i>
                        <span>Languages</span>
                    </div>
                    <p>
                        <span>:  English, Arabic</span>
                    </p>
                </div> <!-- End contact-item -->
            </div> <!-- End contact-info -->

            <div class="contact-icons">
                <div class="contact-icon">
                    <a href="www.facebook.com" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/EmanFoul" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://github.com/Eman-Abu-Foul/" target="_blank">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="#" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div> <!-- End contact-icons -->

        </div> <!-- End left-contact -->

        <div class="right-contact">
            <form action="" class="contact-form">
                <div class="input-control i-c-2">
                    <input type="text" required placeholder="YOUR NAME">
                    <input type="email" required placeholder="YOUR EMAIL">
                </div> <!-- End input-control -->
                <div class="input-control">
                    <input type="text" required placeholder="ENTER SUBJECT">
                </div> <!-- End input-control -->
                <div class="input-control">
                    <textarea name="" id="" cols="15" rows="8" placeholder="Message Here..."></textarea>
                </div> <!-- End input-control -->
                <div class="submit-btn">
                    <a href="#" class="main-btn">
                        <span class="btn-text">Send </span>
                        <span class="btn-icon"><i class="fas fa-envelope"></i></span>
                    </a>
                </div> <!-- End submit-btn -->
            </form> <!-- End contact-form -->
        </div> <!-- End right-contact -->

    </div> <!-- End contact-content-con -->
            
   </template>
   <style scoped>
 

   section{
    width: 80%;
    margin: 0 auto;
   }
.contact-content-con {
    width: 70%;
    margin: 0 auto;
  display: flex;
  padding-top: 3.5rem;
}
.contact-content-con .left-contact {
  flex: 2;
}
.contact-content-con .left-contact h4 {
  margin-top: 1rem;
  font-size: 2rem;
  text-transform: uppercase;
}
.contact-content-con .left-contact p {
  margin: 1rem 0;
  line-height: 2rem;
}
.contact-content-con .left-contact .contact-info .contact-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.contact-content-con .left-contact .contact-info .contact-item p {
  margin: 0.3rem 0 !important;
  padding: 0 !important;
}
.contact-content-con .left-contact .contact-info .contact-item .icon {
  display: grid;
  grid-template-columns: 40px 1fr;
}
.contact-content-con .left-contact .contact-info .contact-item .icon i {
  display: flex;
  align-items: center;
  font-size: 1.3rem;
}
.contact-content-con .left-contact .contact-icon {
  display: flex;
  margin-top: 2rem;
}
.contact-content-con .left-contact .contact-icon a {
  display: flex;
  align-items: center;
  color: #fff;
  background-color: #2a2e35;
  cursor: pointer;
  justify-content: center;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  margin: 0 0.4rem;
  transition: all 0.4s ease-in-out;
}
.contact-content-con .left-contact .contact-icon a:hover {
  background-color: #0099ff;
}
.contact-content-con .left-contact .contact-icon a:hover i {
  color: #191d2b;
}
.contact-content-con .left-contact .contact-icon a i {
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.3rem;
}
.contact-content-con .right-contact {
  flex: 3;
  margin-left: 3rem;
}
.contact-content-con .right-contact .input-control {
  margin: 1.5rem 0;
}
.contact-content-con .right-contact .input-control input,
 .contact-content-con .right-contact .input-control textarea {
  border-radius: 30px;
  font-weight: inherit;
  font-size: inherit;
  font-family: inherit;
  padding: 0.8rem 1.1rem;
  outline: none;
  border: none;
  background-color: #2a2e35;
  width: 100%;
  color: #fff;
  resize: none;
}
.contact-content-con .right-contact .i-c-2 {
  display: flex;
}
.contact-content-con .right-contact .i-c-2 :last-child {
  margin-left: 1.5rem;
}
.contact-content-con .right-contact .submit-btn {
  display: flex;
  justify-content: flex-start;
}
a{
    text-decoration: none
}

.main-btn {
  border-radius: 30px;
  color: inherit;
  font-weight: 600;
  position: relative;
  border: 1px solid #0099ff;
  display: flex;
  align-self: flex-start;
  align-items: center;
  overflow: hidden;
}
.main-btn .btn-text {
  padding: 0 2rem;
}
.main-btn .btn-icon {
  background-color: #0099ff;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  padding: 1rem;
}
.main-btn::before {
  content: "";
  position: absolute;
  top: 0;
  right: 0;
  transform: translateX(100%);
  transition: all 0.4s ease-out;
  z-index: -1;
}
.main-btn:hover {
  transition: all 0.4s ease-out;
}
.main-btn:hover::before {
  width: 100%;
  height: 100%;
  background-color:#0099ff;
  transform: translateX(0);
  transition: all 0.4s ease-out;
}
   </style>
   
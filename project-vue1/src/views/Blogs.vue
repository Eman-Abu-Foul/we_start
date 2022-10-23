<template>
	<div>
		<div class="main-title">
	<h2>PERSONAL WEBSITE</h2>
	<p>Responsive vertical/horizontal header website theme.</p>
</div>	
    
<div class="slider">
        <input type="radio" name="testimonial" id="t-1">
        <input type="radio" name="testimonial" id="t-2">
        <input type="radio" name="testimonial" id="t-3" checked>
        <input type="radio" name="testimonial" id="t-4">
        <input type="radio" name="testimonial" id="t-5">
   

	<div class="testimonials">
		<label class="item" for="t-1">
			<img src="../assets/images/img1.jpg" alt="picture">
			
			<h2> CryptoNeed </h2>
            <p>Analytics and sales of crypto currency</p>
		</label>
		<label class="item" for="t-2">
			<img src="../assets/images/img2.jpg" alt="picture">
			
			<h2>MACHETE ENERGY</h2>
            <p>Energy drink website</p>
		</label>
		<label class="item" for="t-3">
			<img src="../assets/images/img3.jpg" alt="picture">
			
			<h2>PORTFOLIO</h2>
            <p>Mockup of a personal portfolio I was working on for a friend.</p>
		</label>
		<label class="item" for="t-4">
			<img src="../assets/images/img4.jpg" alt="picture">
			
			<h2>PIXBORED</h2>
            <p>Website for sharing images and gifs.</p>
		</label>
		<label class="item" for="t-5">
			<img src="../assets/images/img5.jpg" alt="picture">
			
			<h2>PERSONAL WEBSITE</h2>
            <p>Responsive vertical/horizontal header website theme.</p>
		</label>
	</div> <!-- End testimonials -->
	<div class="dots">
		<label for="t-1"></label>
		<label for="t-2"></label>
		<label for="t-3"></label>
		<label for="t-4"></label>
		<label for="t-5"></label>
	</div> <!-- End dots -->
</div> <!-- End slider -->
    
	</div>

</template>
<style scoped>

.slider {
	width: 98%;
    margin: 50px 1%;
	overflow: hidden;
}
.slider input {
	display: none;
}
.testimonials {
	display: flex;
	align-items: center;
	justify-content: center;
	position: relative;
	height: 450px;
	perspective: 1000px;
	overflow: hidden;
}
.testimonials .item {
	width: 450px;
    height: 500px;
	padding: 30px;
	border-radius: 5px;
	background-color: #2a2e35;
	position: absolute;
	top: 0;
	box-sizing: border-box;
	text-align: center;
	transition: transform 0.4s;
	box-shadow: 0 0 10px rgba(0,0,0,0.3);
	user-select: none;
	cursor: pointer;
}
.testimonials .item img {
	width: 90%;
	object-fit: cover;
    border-radius: 10px;
	border: 2px solid #3B344D;
}
.testimonials .item p {
	color: #ddd;
}
.testimonials .item h2 {
	font-size: 14px;
}
.dots {
    padding-top: 20px;
	display: flex;
	justify-content: center;
	align-items: center;
}
.dots label {
	height: 5px;
	width: 5px;
	border-radius: 50%;
	cursor: pointer;
	background-color: #413B52;
	margin: 7px;
	transition-duration: 0.2s;
}

#t-1:checked ~ .dots label[for="t-1"],
#t-2:checked ~ .dots label[for="t-2"],
#t-3:checked ~ .dots label[for="t-3"],
#t-4:checked ~ .dots label[for="t-4"],
#t-5:checked ~ .dots label[for="t-5"] {
	transform: scale(2);
	background-color: #fff;
}
#t-1:checked ~ .dots label[for="t-2"],
#t-2:checked ~ .dots label[for="t-1"],
#t-2:checked ~ .dots label[for="t-3"],
#t-3:checked ~ .dots label[for="t-2"],
#t-3:checked ~ .dots label[for="t-4"],
#t-4:checked ~ .dots label[for="t-3"],
#t-4:checked ~ .dots label[for="t-5"],
#t-5:checked ~ .dots label[for="t-4"] {
	transform: scale(1.5);
}
#t-1:checked ~ .testimonials label[for="t-3"],
#t-2:checked ~ .testimonials label[for="t-4"],
#t-3:checked ~ .testimonials label[for="t-5"],
#t-4:checked ~ .testimonials label[for="t-1"],
#t-5:checked ~ .testimonials label[for="t-2"] {
	transform: translate3d(600px, 0, -180px) rotateY(-25deg);
	z-index: 2;
}
#t-1:checked ~ .testimonials label[for="t-2"],
#t-2:checked ~ .testimonials label[for="t-3"],
#t-3:checked ~ .testimonials label[for="t-4"],
#t-4:checked ~ .testimonials label[for="t-5"],
#t-5:checked ~ .testimonials label[for="t-1"] {
	transform: translate3d(300px, 0, -90px) rotateY(-15deg);
	z-index: 3;
}
#t-2:checked ~ .testimonials label[for="t-1"],
#t-3:checked ~ .testimonials label[for="t-2"],
#t-4:checked ~ .testimonials label[for="t-3"],
#t-5:checked ~ .testimonials label[for="t-4"],
#t-1:checked ~ .testimonials label[for="t-5"] {
	transform: translate3d(-300px, 0, -90px) rotateY(15deg);
	z-index: 3;
}
#t-3:checked ~ .testimonials label[for="t-1"],
#t-4:checked ~ .testimonials label[for="t-2"],
#t-5:checked ~ .testimonials label[for="t-3"],
#t-2:checked ~ .testimonials label[for="t-5"],
#t-1:checked ~ .testimonials label[for="t-4"] {
	transform: translate3d(-600px, 0, -180px) rotateY(25deg);
}
#t-1:checked ~ .testimonials label[for="t-1"],
#t-2:checked ~ .testimonials label[for="t-2"],
#t-3:checked ~ .testimonials label[for="t-3"],
#t-4:checked ~ .testimonials label[for="t-4"],
#t-5:checked ~ .testimonials label[for="t-4"],
#t-5:checked ~ .testimonials label[for="t-5"] {
	z-index: 4;
}

</style>

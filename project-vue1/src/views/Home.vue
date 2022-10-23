<template>
  <div class="header-content">
    <div class="left-header">
      <div class="h-shape"></div>
      <div class="image">
        <img src="../assets/images/img-logo.webp" alt=""> 
        <!-- <img src="" alt=""> -->
      </div> <!-- End image  -->
    </div> <!-- End left-header -->
    <div class="right-header">
        <h1 class="name">
            Hi, I'm <span>Eman Abu Foul.</span>
            A Web Developer.
        </h1>
        <p>
            I'm a Web Developer, I love to create beautiful and functional websites.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, libero?
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque blanditiis sed aut!
        </p>
        
    </div> <!-- End right-header -->
  </div> <!-- End header-content -->
</template>
<style scoped>

.header-content {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  min-height: 100vh;
  background-color: #191d2b;
}
.header-content .left-header {
  display: flex;
  align-items: center;
  position: relative;
}
.header-content .left-header .h-shape {
  transition: all 0.4s ease;
  width: 65%;
  height: 100%;
  background-color: #0099ff !important;
  position: absolute;
  left: 0;
  top: 0;
  z-index: 0;
  clip-path: polygon(0 0, 46% 0, 79% 100%, 0% 100%);
}
.header-content .left-header .image {
  border-radius: 14px;
  height: 85%;
  width: 64%;
  margin-left: 4rem;
  background-color: #000;
  transition: all 0.4s ease-in-out;
  
}
.header-content .left-header .image img {
  width: 100%;
  height: 100%;
  border-radius: 14px;
  object-fit: cover;
  transition: all 0.4s ease-in-out;
  filter: grayscale(100%);
}
.header-content .left-header .image img:hover {
  filter: grayscale(0);
}
.header-content .right-header {
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding-right: 18rem;
}
.header-content .right-header .name {
  font-weight: bold;
  font-size: 3rem;
}
.header-content .right-header .name span {
  color:#0099ff;
}
.header-content .right-header p {
  margin: 1.5rem 0;
  line-height: 2rem;
}

</style>


<template>
    <div class="blog">
        <div class="blog-image">
            <img :src="product.image" alt="">
            <p class="price">{{ product.price }}$</p>
        </div>
        
        <div class="blog-text">
            <h4>
                {{ product.name }}
            </h4>
            <span v-for="(cat , i) in product.category" :key="i"> {{ cat }} </span> 
            <p>
                {{ product.description }}
            </p>
            
        </div>
    </div>
                    
</template>
<script>
export default {
    props:['product']
}
</script>

<style scoped>

.blogs .blog {
  width: 25%;
  margin: 1%;
  background-color: #2a2e35;
  border-radius: 5px;
  transition: all 0.4s ease;
}
.blogs .blog:hover {
  transform: translateY(-5px);
  transition: all 0.4s ease;
}

.blogs .blog img {
  width: 100%;
  height: 250px;
  object-fit: cover;
  transition: all 0.4s ease;
}
.blogs .blog .blog-text {
    margin-top: -20px;
    padding: 0 10px;
    
}
.blogs .blog .blog-image{
    position: relative;
    ;
}
.blogs .blog .blog-image .price{
    position: absolute;
    top: 1%;
    right: 0;
    border-radius: 5px;
    background: #0099ff;
    color: #fff;
    padding: 5px 10px;
    text-align: center;
    transform: translateX(5%);
}

.blogs .blog .blog-text h4 {
  font-size: 1.5rem;
  margin-bottom: 10px;
  transition: all 0.4s ease;
  cursor: pointer;
}
.blogs .blog .blog-text span {
    background-color: hsla(0, 0%, 80%, 0.5);
    display: inline-block;
    border-radius: 15px;
    padding: 0 10px;
    margin: 2px;
}
.blogs .blog .blog-text h4:hover {
  color: #0099ff;
  
}
.blogs .blog .blog-text p {
  color: #b2becd;
  line-height: 2rem;
  padding-bottom: 1rem;
}
</style>

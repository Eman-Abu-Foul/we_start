<template>
    <div class="portfolto-content">
    <div class="left-portfolto">
        
        <div class="blogs-content">
                <div class="main-title">
                    <h2>My Work</h2>
                </div>
                <div class="blogs">
                    <product v-for="(product, i) in products" :key="i" :product="product"/>
                </div>
            </div>
        
    </div> <!-- End left-portfolto -->
    <div class="right-portfolto">
        <div class="input-control">
           
            <input type="text" required placeholder="Search By Name...">
            <div class="category">
                <h3 for=""> Search By Category  </h3>
                <label  @change="filterProducts"  v-for="( cat , i ) in categories" :key="i" class="input-checbox">
                    <input type="checkbox" name="checkbox" v-model="selected_categories" :value="cat" />
                    {{ cat }}
                </label>
               
            </div>
            
            
        </div> <!-- End input-control -->

     
        
        
    </div> <!-- End right-portfolto -->
  </div> <!-- End portfolto-content -->
</template>
<script>
import product from '../components/product.vue'
import products from '../data/data.json'
export default {
    components:{
        product
    },
    data(){
        return{
            products,
            names:["Biodex","Domainer","Zontrax","Bitchip","Alpha","Zathin","Wrapsafe","Cookley","Zoolab"],
            categories:["mobile","web","ux/ui"],
            selected_categories : [] ,
            baseproducts : products ,
        }
    },
    methods:{
        filterProducts() {
            // console.log('Done');
            this.products = this.baseproducts
            if(this.selected_categories.length > 0) {
                console.log(this.selected_categories.length);
                // this.products = this.baseproducts.filter(p => this.selected_categories.some(p.category))
                this.products = this.baseproducts.filter(p => p.category.some(c => this.selected_categories.includes(c)))
            }
            
           
        }
    }
    
    // watch: {
    //     selected_categories: function() {
    //         if(this.selected_categories.length > 0){
    //             console.log(this.products);
    //             this.products = this.baseproducts.filter(p => this.selected_categories.includes(p.category))
    //             console.log(this.products);
    //         }else{
    //             this.products = this.baseproducts
    //         }
            
    //     }
    // }

}
</script>

<style scoped>

.portfolto-content {
  display: flex;
  /* grid-template-columns: repeat(2, 1fr); */
  min-height: 100vh;
}
.portfolto-content .left-portfolto {
  background-color: #191d2b;
  width: 75%;
}

.portfolto-content .right-portfolto {
    background-color: #0099ff;
    width: 25%;
}
.blogs {
    display: flex;
    justify-content: center;
    justify-items: center;
    flex-wrap: wrap
}

.right-portfolto .input-control,
.right-portfolto .input-control .category{
    padding: 0 20px;
    
}
.right-portfolto .input-control .category h3{
    font-size: 25px
}
.right-portfolto .input-control input{
  border-radius: 10px;
  font-size: inherit;
  font-family: inherit;
  padding: 12px 20px;
  outline: none;
  border: none;
  margin: 10% 5% 5px;
  background-color: #2a2e35;
  width: 90%;
  color: #fff;
}

.input-checbox {
  font-size: 25px;
  line-height: 1.1;
  display: grid;
  grid-template-columns: 1em auto;
  gap: 0.5em;
  
}

</style>

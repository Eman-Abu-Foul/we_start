<script setup>
import { onMounted, ref } from "vue";
import { useUserStore } from "../stores/user";
// import { useI18n } from "vue-i18n";
const user = useUserStore();
const products = ref({});
const loading = ref(false)
// const lang = ref('')
onMounted(e => {
  // lang.value = localStorage.getItem('locale') ?? 'ar';
  getProducts();
  // toastr.success("rrrr")
});
const getProducts = () => {
  axios.get('/products', {
    params: {
      // lang: lang.value
    }
  })
      .then(res => {
        products.value = res.data.data;
      })
}
const add_to_cart = (id) => {
  loading.value = true;
  user.addToCart(id)
  // toastr.success("Product added to cart")
  // iziToast.success("rrrr")
  // loading.value = false;
}
</script>
<template>
  <div class="container py-4 flex items-center gap-3">
    <a href="#" class="text-primary text-base">
      <i class="fa-solid fa-house"></i>
    </a>
    <span class="text-sm text-gray-400">
      <i class="fa-solid fa-chevron-right"></i>
    </span>
    <p class="text-gray-600 font-medium">Shop</p>
  </div>
  <div class="container grid grid-cols-4 gap-6 pt-4 pb-16 items-start">
    <!-- sidebar -->
    <div class="col-span-1 bg-white px-4 pb-6 shadow rounded overflow-hidden">
      <div class="divide-y divide-gray-200 space-y-5">
        <div>
          <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">
            Categories
          </h3>
          <div class="space-y-2">
            <div class="flex items-center">
              <input
                type="checkbox"
                name="cat-1"
                id="cat-1"
                class="text-primary focus:ring-0 rounded-sm cursor-pointer"
              />
              <label for="cat-1" class="text-gray-600 ml-3 cusror-pointer"
                >Bedroom</label
              >
              <div class="ml-auto text-gray-600 text-sm">(15)</div>
            </div>
            <div class="flex items-center">
              <input
                type="checkbox"
                name="cat-2"
                id="cat-2"
                class="text-primary focus:ring-0 rounded-sm cursor-pointer"
              />
              <label for="cat-2" class="text-gray-600 ml-3 cusror-pointer"
                >Sofa</label
              >
              <div class="ml-auto text-gray-600 text-sm">(9)</div>
            </div>
            <div class="flex items-center">
              <input
                type="checkbox"
                name="cat-3"
                id="cat-3"
                class="text-primary focus:ring-0 rounded-sm cursor-pointer"
              />
              <label for="cat-3" class="text-gray-600 ml-3 cusror-pointer"
                >Office</label
              >
              <div class="ml-auto text-gray-600 text-sm">(21)</div>
            </div>
            <div class="flex items-center">
              <input
                type="checkbox"
                name="cat-4"
                id="cat-4"
                class="text-primary focus:ring-0 rounded-sm cursor-pointer"
              />
              <label for="cat-4" class="text-gray-600 ml-3 cusror-pointer"
                >Outdoor</label
              >
              <div class="ml-auto text-gray-600 text-sm">(10)</div>
            </div>
          </div>
        </div>

        <div class="pt-4">
          <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">
            Brands
          </h3>
          <div class="space-y-2">
            <div class="flex items-center">
              <input
                type="checkbox"
                name="brand-1"
                id="brand-1"
                class="text-primary focus:ring-0 rounded-sm cursor-pointer"
              />
              <label for="brand-1" class="text-gray-600 ml-3 cusror-pointer"
                >Cooking Color</label
              >
              <div class="ml-auto text-gray-600 text-sm">(15)</div>
            </div>
            <div class="flex items-center">
              <input
                type="checkbox"
                name="brand-2"
                id="brand-2"
                class="text-primary focus:ring-0 rounded-sm cursor-pointer"
              />
              <label for="brand-2" class="text-gray-600 ml-3 cusror-pointer"
                >Magniflex</label
              >
              <div class="ml-auto text-gray-600 text-sm">(9)</div>
            </div>
            <div class="flex items-center">
              <input
                type="checkbox"
                name="brand-3"
                id="brand-3"
                class="text-primary focus:ring-0 rounded-sm cursor-pointer"
              />
              <label for="brand-3" class="text-gray-600 ml-3 cusror-pointer"
                >Ashley</label
              >
              <div class="ml-auto text-gray-600 text-sm">(21)</div>
            </div>
            <div class="flex items-center">
              <input
                type="checkbox"
                name="brand-4"
                id="brand-4"
                class="text-primary focus:ring-0 rounded-sm cursor-pointer"
              />
              <label for="brand-4" class="text-gray-600 ml-3 cusror-pointer"
                >M&amp;D</label
              >
              <div class="ml-auto text-gray-600 text-sm">(10)</div>
            </div>
            <div class="flex items-center">
              <input
                type="checkbox"
                name="brand-5"
                id="brand-5"
                class="text-primary focus:ring-0 rounded-sm cursor-pointer"
              />
              <label for="brand-5" class="text-gray-600 ml-3 cusror-pointer"
                >Olympic</label
              >
              <div class="ml-auto text-gray-600 text-sm">(10)</div>
            </div>
          </div>
        </div>

        <div class="pt-4">
          <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">
            Price
          </h3>
          <div class="mt-4 flex items-center">
            <input
              type="text"
              name="min"
              id="min"
              class="
                w-full
                border-gray-300
                focus:border-primary
                rounded
                focus:ring-0
                px-3
                py-1
                text-gray-600
                shadow-sm
              "
              placeholder="min"
            />
            <span class="mx-3 text-gray-500">-</span>
            <input
              type="text"
              name="max"
              id="max"
              class="
                w-full
                border-gray-300
                focus:border-primary
                rounded
                focus:ring-0
                px-3
                py-1
                text-gray-600
                shadow-sm
              "
              placeholder="max"
            />
          </div>
        </div>

        <div class="pt-4">
          <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">size</h3>
          <div class="flex items-center gap-2">
            <div class="size-selector">
              <input type="radio" name="size" id="size-xs" class="hidden" />
              <label
                for="size-xs"
                class="
                  text-xs
                  border border-gray-200
                  rounded-sm
                  h-6
                  w-6
                  flex
                  items-center
                  justify-center
                  cursor-pointer
                  shadow-sm
                  text-gray-600
                "
                >XS</label
              >
            </div>
            <div class="size-selector">
              <input type="radio" name="size" id="size-sm" class="hidden" />
              <label
                for="size-sm"
                class="
                  text-xs
                  border border-gray-200
                  rounded-sm
                  h-6
                  w-6
                  flex
                  items-center
                  justify-center
                  cursor-pointer
                  shadow-sm
                  text-gray-600
                "
                >S</label
              >
            </div>
            <div class="size-selector">
              <input type="radio" name="size" id="size-m" class="hidden" />
              <label
                for="size-m"
                class="
                  text-xs
                  border border-gray-200
                  rounded-sm
                  h-6
                  w-6
                  flex
                  items-center
                  justify-center
                  cursor-pointer
                  shadow-sm
                  text-gray-600
                "
                >M</label
              >
            </div>
            <div class="size-selector">
              <input type="radio" name="size" id="size-l" class="hidden" />
              <label
                for="size-l"
                class="
                  text-xs
                  border border-gray-200
                  rounded-sm
                  h-6
                  w-6
                  flex
                  items-center
                  justify-center
                  cursor-pointer
                  shadow-sm
                  text-gray-600
                "
                >L</label
              >
            </div>
            <div class="size-selector">
              <input type="radio" name="size" id="size-xl" class="hidden" />
              <label
                for="size-xl"
                class="
                  text-xs
                  border border-gray-200
                  rounded-sm
                  h-6
                  w-6
                  flex
                  items-center
                  justify-center
                  cursor-pointer
                  shadow-sm
                  text-gray-600
                "
                >XL</label
              >
            </div>
          </div>
        </div>

        <div class="pt-4">
          <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">
            Color
          </h3>
          <div class="flex items-center gap-2">
            <div class="color-selector">
              <input type="radio" name="color" id="red" class="hidden" />
              <label
                for="red"
                class="
                  border border-gray-200
                  rounded-sm
                  h-6
                  w-6
                  cursor-pointer
                  shadow-sm
                  block
                "
                style="background-color: #fc3d57"
              ></label>
            </div>
            <div class="color-selector">
              <input type="radio" name="color" id="black" class="hidden" />
              <label
                for="black"
                class="
                  border border-gray-200
                  rounded-sm
                  h-6
                  w-6
                  cursor-pointer
                  shadow-sm
                  block
                "
                style="background-color: #000"
              ></label>
            </div>
            <div class="color-selector">
              <input type="radio" name="color" id="white" class="hidden" />
              <label
                for="white"
                class="
                  border border-gray-200
                  rounded-sm
                  h-6
                  w-6
                  cursor-pointer
                  shadow-sm
                  block
                "
                style="background-color: #fff"
              ></label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ./sidebar -->

    <!-- products -->
    <div class="col-span-3">
      <div class="flex items-center mb-4">
        <select
          name="sort"
          id="sort"
          class="
            w-44
            text-sm text-gray-600
            py-3
            px-4
            border-gray-300
            shadow-sm
            rounded
            focus:ring-primary focus:border-primary
          "
        >
          <option value="">Default sorting</option>
          <option value="price-low-to-high">Price low to high</option>
          <option value="price-high-to-low">Price high to low</option>
          <option value="latest">Latest product</option>
        </select>

        <div class="flex gap-2 ml-auto">
          <div
            class="
              border border-primary
              w-10
              h-9
              flex
              items-center
              justify-center
              text-white
              bg-primary
              rounded
              cursor-pointer
            "
          >
            <i class="fa-solid fa-grip-vertical"></i>
          </div>
          <div
            class="
              border border-gray-300
              w-10
              h-9
              flex
              items-center
              justify-center
              text-gray-600
              rounded
              cursor-pointer
            "
          >
            <i class="fa-solid fa-list"></i>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-3 gap-6">
        <div v-for="product in products" :key="product.id" class="bg-white shadow rounded overflow-hidden group">
          <div class="relative">
<!--            <img :src="product.image"-->
<!--                 :alt="product.name" class="w-full"/>-->
            <img
                v-for="(img, i) in product.image"
                :key="i"
                :src="img.path"
                :alt="product.name"
                class="w-full"
            />
            <div class=" absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition" >
              <a href="#" class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition" title="view product">
                <i class="fa-solid fa-magnifying-glass"></i>
              </a>
              <a
                href="#"
                class="
                  text-white text-lg
                  w-9
                  h-8
                  rounded-full
                  bg-primary
                  flex
                  items-center
                  justify-center
                  hover:bg-gray-800
                  transition
                "
                title="add to wishlist"
              >
                <i class="fa-solid fa-heart"></i>
              </a>
            </div>
          </div>
          <div class="pt-4 pb-3 px-4">
            <a href="#">
              <h4
                class="
                  uppercase
                  font-medium
                  text-xl
                  mb-2
                  text-gray-800
                  hover:text-primary
                  transition
                "
              >
                {{ product.name }}
              </h4>
            </a>
            <div class="flex items-baseline mb-1 space-x-2">
              <template v-if="product.coupons">
                <p class="text-xl text-primary font-semibold">
                  ${{ product.final_price }}
                </p>
                <p class="text-sm text-gray-400 line-through">${{ product.price  }}</p>
              </template>
              <template v-else>
                <p class="text-xl text-primary font-semibold">${{ product.price }}</p>
              </template>
            </div>
            <div class="flex items-center">
              <div class="flex gap-1 text-sm text-yellow-400">
                <span><i class="fa-solid fa-star"></i></span>
                <span><i class="fa-solid fa-star"></i></span>
                <span><i class="fa-solid fa-star"></i></span>
                <span><i class="fa-solid fa-star"></i></span>
                <span><i class="fa-solid fa-star"></i></span>
              </div>
              <div class="text-xs text-gray-500 ml-3">(150)</div>
            </div>
          </div>
          <button @click="add_to_cart(product.id)"
                  class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition"
          >Add To Cart</button>
        </div>

      </div>
    </div>
    <!-- ./products -->
  </div>
</template>

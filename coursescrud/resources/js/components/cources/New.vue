<script setup>
import axios from "axios";
import { ref } from "vue";
import { useRouter } from 'vue-router'
let router = useRouter();

    let course = ref({
        title:'',
        image: '',
        content: '',
        price: '',
        discount: ''
    })

let errors = ref({})
    const updateImage = (e) => {
        course.value.image = e.target.files[0]
    }
    const addCourse = () => {
        let formData = new FormData();
        formData.append('title',course.value.title)
        formData.append('image',course.value.image)
        formData.append('content',course.value.content)
        formData.append('price',course.value.price)
        formData.append('discount',course.value.discount)

        let config = {
            header:{
                "Content-Type":"multipart/form-data"
            }
        }
        axios.post('/api/v1/courses', formData, config)
            .then(res => {
                console.log(res)
                router.push('/')
                Toast.fire({
                    icon: 'success',
                    title: 'Created Course successfully'
                })

            })
            .catch(err => {
                errors.value = err.response.data.errors
            })

    }
</script>
<template>
    <div class="container mt-5">
        {{ errors.image }}
        <div class="alert alert-danger" v-if="Object.keys( errors ).length > 0">

            <p v-for="(err,i) in errors" :key="i">
            {{ err }}
            </p>
        </div>
        <h1>Add New Course</h1>
        <form action="" @submit.prevent="addCourse">
            <div class="mb-3">
                <label>Title</label>
                <input type="text" placeholder="Title" class="form-control" :class="{ 'is-invalid' : errors.title }" v-model="course.title" />
                <span class="invalid-feedback" v-if="errors.title">{{ errors.title[0] }}</span>
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input type="file" class="form-control" :class="{ 'is-invalid' : errors.image }"  @change="updateImage" />
                <span class="invalid-feedback" v-if="errors.image">{{ errors.image }}</span>
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea
                    placeholder="Description"
                    class="form-control"
                    rows="5"
                    v-model="course.content"
                ></textarea>
            </div>

            <div class="mb-3">
                <label>Price</label>
                <input type="number" placeholder="Price" class="form-control" :class="{ 'is-invalid' : errors.price }"  v-model="course.price" />
                <span class="invalid-feedback" v-if="errors.price">{{ errors.price }}</span>
            </div>

            <div class="mb-3">
                <label>Discount</label>
                <input type="number" placeholder="Discount" class="form-control" v-model="course.discount" />
            </div>

            <button class="btn btn-success px-4" >Add</button>
        </form>
    </div>
</template>



<style scoped>

</style>

<template>
    <div class="container">
        <div class="row">
            <div v-for="dish in dishes" :key="dish.id">
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="#" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ dish.name }}</h5>
                            <p>{{ dish.user.id }}</p>
                            <p>{{ dish.user.category_id }}</p>
                            <p class="card-text">{{ dish.description }}</p>
                            <a :href="`/guest/dish/${ dish.id }`" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

export default {
    name: 'App',
    data(){
        return{
            dishes: [],
            categories: [],
        }
    },

    methods: {
        dishList(){
            axios.get('/api/dishes')
            .then((res) => {
                this.dishes = [...res.data.data]
            })
        },

        categoryList(){
            axios.get('/api/category')
            .then((res) => {
                this.categories = [...res.data]
            })
        }
    },
    // computed: {
    //     category(catId){
    //         console.log(catId);
    //     }
    // },

    mounted(){
        this.dishList()
        this.categoryList()
    },
}
</script>

<style>

</style>
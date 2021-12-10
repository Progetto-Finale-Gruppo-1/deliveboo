<template>
    <div class="container">
        <input type="text" v-model="input">
        <div class="row">
            <div v-for="dish in filterDish" :key="dish.id">
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="#" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="d-none" v-if="dish.category == null"></h5>
                            <h5 class="cat_name" v-else>{{ dish.category.name }}</h5>
                            <p>{{ dish.id }}</p>
                            <p>{{ dish.category_id }}</p>
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
            input: '',
            dishes: [],
            categories: [],
            
        }
    },

    methods: {
        dishList(){
            axios.get('/api/dishes')
            .then((res) => {
                this.dishes = [...res.data]
                // console.log(res.data);
            })
        },
    },

        computed: {
        filterDish: function(){
            return this.dishes.filter((dish) => {
                if(dish.category == null){
                    return
                }else{
                    return dish.category.name.toLowerCase().match(this.input.toLowerCase())
                }
            })
        }
    },

    mounted(){
        this.dishList()
        // this.categoryList()
    },
    
}
</script>

<style>

</style>
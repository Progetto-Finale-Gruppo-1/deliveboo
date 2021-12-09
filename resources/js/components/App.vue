<template>
    <div class="container">
        <div class="row">
            <div v-for="dish in dishes" :key="dish.id">
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="#" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ dish.name }}</h5>
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
        }
    },

    methods: {
        list(){
            axios.get('/api/dishes')
            .then((res) => {
                this.dishes = [...res.data.data]
            })
        }
    },

    mounted(){
        this.list()
    },
}
</script>

<style>

</style>
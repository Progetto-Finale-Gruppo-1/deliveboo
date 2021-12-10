<template>

    <div class="container">
        <input type="text" v-model="input">
        <div v-for="type in types" :key="type.id" class="d-inline mx-2 input">
            <input type="checkbox" :id="`input${type.id}`" :value="type.name" v-model="checked" @change="getCheck">
            <label :for="`input${type.id}`">{{ type.name }}</label>
        </div>
        <div class="row">
            <div v-for="user in filterUSer" :key="user.id">
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="#" class="card-img-top" alt="...">
                        <div class="card-body">
                            <!-- <h5 class="d-none" v-if="user.category == null"></h5> -->
                            <h5 class="cat_name">{{ user.category.name }}</h5>
                            <p>{{ user.id }}</p>
                            <p>{{ user.category_id }}</p>
                            <p class="card-text">{{ user.description }}</p>
                            <a :href="`/guest/dish/${ user.id }`" class="btn btn-primary">Go somewhere</a>
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
            users: [],
            types: [],
            checked: [],
        }
    },

    methods: {
        usersList(){
            axios.get('/api/user').then(res => this.users = [...res.data])
        },
        typesList(){
            axios.get('/api/type').then(res => this.types = [...res.data])
        },
        getCheck(){
            console.log(this.checked);
        }
    },

    computed: {
        filterUSer(){
            return this.users.filter((user) => {
                if(user.category !== null) return user.category.name.toLowerCase().match(this.input.toLowerCase())
                if(user.category !== null) return user.category.name.toLowerCase().match(this.input.toLowerCase())
            })
        },
    },

    mounted(){
        this.usersList()
        this.typesList()
        this.getCheck()
    },
    
}
</script>

<style>

</style>
<template>

    <div class="container">
        <input type="text" v-model="input">
        <div v-for="type in types" :key="type.id" class="d-inline mx-2 input">
            <input type="radio" :id="`input${type.id}`" :value="type.id" v-model="checked">
            <label :for="`input${type.id}`">{{ type.name }}</label>
        </div>
        <div class="row">
            <div v-for="user in filterType" :key="user.id">
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="#" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="d-none" v-if="user.category == null"></h5>
                            <p >{{ user.name }}</p>
                            <p v-for="type in user.types" :key="type.id">{{ type.name }}</p>
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
            input: '',      // input ricerca type:text
            users: [],      // array degli user
            types: [],      // array dei tipi di ristorante
            checked: '',    // array di ingredienti checcati
        }
    },

    methods: {
        usersList(){
            axios.get('/api/user').then(res => this.users = [...res.data])
        },
        typesList(){
            axios.get('/api/type').then(res => this.types = [...res.data])
        },
        // getCheck(){
        //     console.log(this.checked);
        // }
    },

    computed: {
        // filterUser(){
        //     this.users.filter((user) => {
        //         return user.types.filter(type => {
        //             return type.name == 'Mexican'
        //         })
        //     })
        //     console.log(this.users);
        // },


        filterUser: function(){
            return this.users.filter((user) => {
                if(user.category !== null) return user.category.name.toLowerCase().match(this.input.toLowerCase())
            })
        },
        filterType(){
            let fillato = []
            this.users.forEach(user => {
                return user.types.forEach(type => {
                    if(type.id == this.checked) return fillato.push(user);
                })
            })
            return fillato
        }

    },

    mounted(){
        this.usersList()
        this.typesList()
        // console.log(this.filterType());
    },
    
}
</script>

<style>

</style>
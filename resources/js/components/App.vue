<template>

    <div class="container">
        <div class="row">
            <!-- Valore passato tramite Prop -->
            <p>info dal blade: {{dato}}</p>
        </div>
        <input type="text" v-model="selected.query">
        <div v-for="type in types" :key="type.id" class="d-inline mx-2 input">
            <input type="checkbox" :id="`input${type.id}`" :value="type.name" v-model="selected.checked">
            <label :for="`input${type.id}`">{{ type.name }}</label>
        </div>
        <div class="row">
            <div v-for="user in users" :key="user.id">
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img src="#" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p>{{ user.name }}</p>
                            <p v-for="type in user.types" :key="type.id">{{ type.name }}</p>
                            <div v-for="dish in user.dishes" :key="dish.id">
                                <p>{{ dish.id }}</p>
                                <p>{{ dish.name }}</p>
                            </div>
                            <a :href="`/guest/user/${ user.id }`" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <button v-if="currentPage < lastPage" @click="nextPage">next</button>
            <button v-if="currentPage > 1" @click="previusPage">prev</button>
        </div>
    </div>

</template>

<script>

export default {
    name: 'App',
    props:['dato'],
    data(){
        return{
            users: [],          // array degli user
            types: [],          // array di tutte le tipologie
            lastPage: 0,    
            currentPage: 0,
            selected: {         // input ricevuti
                checked: [],    // checkbox
                query: '',      // ricerca piatti per nome
                page: 1,        // pagina corrente
            }
        }
    },

    methods: {
        usersList(){
            axios.get('/api/user',{
                params: {
                    type: this.selected.checked,
                    dish: this.selected.query,
                    page: this.selected.page
                }
            }).then(res => {
                this.users = res.data.data
                this.lastPage = res.data.last_page
                this.currentPage = res.data.current_page
                })
        },
        typesList(){
            axios.get('api/type').then(res => this.types = res.data)
        },
        nextPage(){
            this.selected.page++
        },
        previusPage(){
            this.selected.page--
        }
    },

    watch: {                // la funzione resta "in ascolto" degli input che vengono inseriti dall'utente,
        selected: {         //appena viene compiuto un cambiamento viene fatta una nuova chiamata che aggiorna i parametri
            handler: function () {
                this.usersList();
            },
            deep: true
        }
    },

    mounted(){
        this.usersList()
        this.typesList()
    },
    
}
</script>

<style>

</style>
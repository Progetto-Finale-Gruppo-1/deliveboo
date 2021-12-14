<template>
    <div class="container">

        <div class="mb-3">
            <!-- Remove per pulizia in produzione -->
            <button @click="removeItems()" class="btn btn-warning">Remove items</button>
        </div>
        <div v-for="piatto in dato" :key="piatto.id" class="row">
            
            <div class="card col-10 mb-3">
                <div class="row">
                    <div class="col-4">                        
                        <img :src="piatto.image" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{piatto.name}}</h5>
                            <p class="card-text">{{piatto.description}}</p>
                            <p class="card-text"><span class="text-white bg-danger">{{piatto.price}}€</span></p>
                        </div>
                    </div>
                </div> 
            </div>
            
            <div class="col-2 d-flex flex-column justify-content-center align-items-center">                
                <!-- <form @submit.prevent="setItems(piatto)">
                    <div>
                        <input v-model.number="quantity" type="number" >
                    </div>
                    <button type="submit" class="btn btn-secondary">Add 1 to Cart</button>
                </form> -->

                <!-- <div>
                    <input type="number" :name="'quantity'+piatto.id" value="1" min="1">
                </div> -->
                <button @click="setItems(piatto)" class="btn btn-secondary">Add 1 to Cart</button>
                <button @click="delItems(piatto.id)" class="btn btn-warning">Remove from Cart</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Show',
    props: {
        dato : Array,
    },
    data(){
        return {            
            storage_key: 'cart_items',
            storageItems: [],
        }
    },

    methods: {
        setItems (piatto) {
            // console.log(document.querySelector(`input[name = 'quantity${piatto.id}']`));
            let change = false;
            // console.log(piatto);
            
            let items = {};
            if(localStorage.getItem(this.storage_key)) {
                items = this.getItems();
                console.log(items.menu);
                console.log(items);

                // Controlla se il piatto è già presente nella lista del localStorage
                const index = items.menu.findIndex(el => el.id === piatto.id)
                console.log(index);

                // Se il piatto è presente allora aggiunge 1 alla quantità
                if (index >= 0) {
                    console.log('i piatti corrispondono');
                    change = true;
                    items.menu[index].quantity++;
                
                // Altrimenti aggiunge il piatto nella lista come nuovo piatto
                }else {
                    items.menu.push({ id : piatto.id, name : piatto.name, price : piatto.price, quantity: 1, check: false});
                    change = true;
                }
            }else {
                change = true;
                items = {restaurant: piatto.user_id, menu: [{ id : piatto.id, name : piatto.name, price : piatto.price, quantity: 1, check : false}]};
            }

            console.log('fuori');
            console.log(items);
            if(change)
            {                
                localStorage.setItem(this.storage_key, JSON.stringify(items));
            }
        },

        getItems () {
            return JSON.parse(localStorage.getItem(this.storage_key));
        },
        
        delItems (id) {
            let change = false;
            let items = [];
            if(localStorage.getItem(this.storage_key)) {
                items = this.getItems();
                const index = items.findIndex(el => el.id === id)
                if(index >= 0)
                {
                    change = true;
                    items.splice(index, 1);
                }

            }

            if(change)
            {                
                localStorage.setItem(this.storage_key, JSON.stringify(items));
            }
        },

        removeItems () {
            localStorage.removeItem(this.storage_key);
        }
    },

    mounted() {
        // this.storageItems = this.getItems();
        // console.log(this.storageItems);
        // console.log(this.dato);
        // console.log(typeof this.dato);
    }
}
</script>

<style>
    input {
        width: 50px;
    }
</style>
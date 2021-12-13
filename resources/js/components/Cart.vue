<template>
    <div class="container">
        <div class="row flex-column">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Prodotto</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Quantità</th>
                    <th scope="col">Rimuovi</th>
                    </tr>
                </thead>
                <tbody>
                <tr v-for="item, i in cartItems" :key="i">
                    <th scope="col"><input type="checkbox" v-model="check" @change="selection(check, item)"></th>
                    <td>{{ item.name }}</td>
                    <td>{{ item.price }}</td>
                    <td>
                        <button class="mx-2" @click="add(item)">+</button>

                        {{ item.quantity }}

                        <button class="mx-2" @click="pick(item)">-</button></td>
                    <td><button class="btn btn-danger" @click="remove(item)">Remove</button></td>
                </tr>
                </tbody>
            </table>
            <button class="btn btn-success" @click="confirmOrder">Confirm Order</button>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            check: false,
            cartItems: [],
            orderItem: [],
            STORAGE_KEY: 'cart_items',
            STORAGE_KEY_CONFIRM: 'cart_confirm',
        }
    },

    created(){
        this.cartItems = JSON.parse(localStorage.getItem(this.STORAGE_KEY) || '[]' )
    },

    methods:{

        add(item){
            item.quantity++
        },

        pick(item){
            if(item.quantity > 0) item.quantity--
        },

        remove(item){
            this.cartItems.splice(this.cartItems.indexOf(item), 1)
            localStorage.setItem(this.STORAGE_KEY, JSON.stringify(this.cartItems))
        },

        confirmOrder(){
            if(this.check) localStorage.setItem(this.STORAGE_KEY_CONFIRM, JSON.stringify(this.orderItem))
        },

        selection(check, item){
            if(check) {
                this.orderItem.push(item)
            }else{
                this.orderItem.splice(this.orderItem.indexOf(item), 1)
            }
        }
    }
}
</script>

<style>

</style>
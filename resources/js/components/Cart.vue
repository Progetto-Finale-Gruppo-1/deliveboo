<template>
    <div class="container">
        <div class="row">
            <input type="text" v-model.trim="newItem" @keyup.enter="addItem()">
            <div v-for="(item, i) in cartItems" :key="i">
                <p>{{ item.name }}</p>
                <p>{{ item.price }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            newItem: '',
            cartItems: [],
            STORAGE_KEY: 'cart_items'
        }
    },

    created(){
        this.cartItems = JSON.parse(localStorage.getItem(this.STORAGE_KEY) || '[]' )
    },

    methods:{

        addItem(){
            this.cartItems.push({name: this.newItem, price:8});
            this.newItem = ''
            localStorage.setItem(this.STORAGE_KEY, JSON.stringify(this.cartItems))
        },
        // addItem(){
        //     this.cartItems.push({name: this.newItem})
        //     this.newItem = ''
        //     localStorage.setItem(this.STORAGE_KEY, JSON.stringify(this.cartItems))
        // }
    }
}
</script>

<style>

</style>
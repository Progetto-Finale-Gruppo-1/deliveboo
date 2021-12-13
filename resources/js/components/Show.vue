<template>
    <div>
        <h2>Titolo randomico</h2>
        <p>Informazione passata tramite Prop: {{dato}}</p>
    </div>
</template>

<script>
export default {
    name: 'Show',
    props: ['dato'],

    mounted() {
        console.log('in Prova.vue');
        console.log(typeof this.dato);
    }
}
</script>

<style>

</style>
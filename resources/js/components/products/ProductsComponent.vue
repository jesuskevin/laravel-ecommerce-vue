<template>
    <material-transition-group tag="div" :css="false" name="fadeIn" class="row">

        <product-card-component v-for="(product, index) in products" v-bind:product="product" :data-index="index" :key="product.id" />

    </material-transition-group>
</template>

<script>
import ProductCardComponent from './ProductCardComponent.vue'
export default {
  components: { ProductCardComponent },
    data(){
        return {
            products : [],

            endpoint : '/productos'
        }
    },

    created(){
        this.fetchProducts()
    },

    methods : {
        fetchProducts(){
            axios.get(this.endpoint).then((response) => {
                // console.log(response.data.data);
                this.products = response.data.data;
            });
        },
    }
}
</script>
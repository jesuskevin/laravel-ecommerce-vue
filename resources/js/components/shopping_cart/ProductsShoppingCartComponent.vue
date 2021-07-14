<template>

<div>
    <material-transition-group tag="div" :css="false" name="fadeIn">

        <article :key="product.id" :data-index="index" v-for="(product, index) in products" class="card-product">
            <div class="row">
                <div class="col-10">
                    <strong>{{product.title}}</strong>
                </div>
                <div class="col-2">
                    {{product.humanPrice}}
                </div>
            </div>
        </article>

    </material-transition-group>

    <article class="total card-product">
            <div class="row">
                <div class="col-10">
                    <strong>Total:</strong>
                </div>
                <div class="col-2">
                    {{total}}
                </div>
            </div>
    </article>
</div>

</template>

<script>
export default {
    data(){
        return {
            endpoint : '/carrito/productos',
            products : []
        }
    },

    created(){
        this.fetchProducts()
    },

    computed : {
        total(){
            let cents = this.products.reduce((acumulator, currentObj) => {
                return acumulator + currentObj.numberPrice
            }, 0);

            return `$${cents/100}`;
        }
    },

    methods : {
        fetchProducts(){
            axios.get(this.endpoint).then(response => {
                // console.log(response.data.data)
                this.products = response.data.data
            })
        }
    }
}
</script>
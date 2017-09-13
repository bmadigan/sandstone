<template>
    <div>
        <vue-simple-spinner message="Loading..." v-if="isLoading"></vue-simple-spinner>

        <div v-for="product in products">
            <div class="card">
                <h3>{{ product.name }}</h3>
                <p>Price: {{ product.price_display }}</p>
                <button class="btn btn-secondary" @click="addToCart(product)">Add To Card</button>
            </div>
        </div>
    </div>
</template>
<script>
    import Spinner      from 'vue-simple-spinner'
    import axios        from 'axios'

    export default {
        components: { Spinner },

        data() {
            return {
                products:  '',
                isLoading:  false,
            }
        },

        methods: {
            fetchProducts() {
                this.startSpinner();
                axios.get('/api/products')
                    .then(response => {
                        this.products = response.data.data;
                        this.stopSpinner();
                    }).catch(error => {
                        alert({ type: 'error', text: 'Server error retreiving products' });
                        console.log(error.message);
                        this.stopSpinner();
                    });
            },
            addToCart(product) {
                this.startSpinner();
                axios.post('/api/cart/add/' + product.id)
                    .then(response => {
                        alert('Product: ' + product.name + ' has been added');
                        this.stopSpinner();
                    }).catch(error => {
                        console.log(error.message);
                        this.stopSpinner();
                    });
            },
            // Loading Spinner
            startSpinner() {
                this.isLoading = true;
            },
            stopSpinner() {
                this.isLoading = false;
            },
        },

        created() {
            this.fetchProducts();
        }
    }
</script>
<style>
.card {
    border: 1px solid #f9f9f9;
    padding:15px;
}
</style>

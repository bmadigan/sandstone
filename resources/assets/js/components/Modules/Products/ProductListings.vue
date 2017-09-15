<template>
    <div>
        <vue-simple-spinner message="Loading..." v-if="isLoading"></vue-simple-spinner>

        <div class="flex-container">
            <div v-for="product in products">
                <div class="list-item">
                    <div class="card">
                        <h3>{{ product.name }}</h3>
                        <p>Price: {{ product.price_display }}</p>
                        <button class="btn btn-secondary" @click="addToCart(product)">Add To Card</button>
                    </div>
                </div>
            </div>
        </div><!--/flex-container-->
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
.flex-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
    align-items: flex-start;
}
.list-item {
    width: 350px;
    margin: auto;
}
</style>

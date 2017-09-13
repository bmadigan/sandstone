<template>
    <div>
        <vue-simple-spinner message="Loading..." v-if="isLoading"></vue-simple-spinner>

        <div v-for="item in items">
            <div class="item-card">
                <table>
                    <tr>
                        <td width="70%">
                            {{ item.name }}
                        </td>
                        <td width="25%">
                            {{ item.price | currency }}
                        </td>
                        <td width="5%" class="right">
                            <button class="btn" @click="removeItem(item)"><i class="fa fa-close"></i></button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="item-card right">
            <h3>Total Due: {{ calculateTotal | currency }}</h3>
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
                items:      '',
                isLoading:  false,
            }
        },

        methods: {
            fetchItems() {
                this.startSpinner();
                axios.get('/api/cart')
                    .then(response => {
                        this.items = response.data.cart;
                        this.stopSpinner();
                    }).catch(error => {
                        alert({ type: 'error', text: 'Server error retreiving products' });
                        console.log(error.message);
                        this.stopSpinner();
                    });
            },
            removeItem(product) {
                this.startSpinner();
                axios.post('/api/cart/remove/' + product.rowId)
                    .then(response => {
                        this.fetchItems();
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
        computed: {
            calculateTotal() {
                return _.sum(_.map(this.items, 'price'))
            }
        },
        created() {
            this.fetchItems();
        }
    }
</script>
<style>
.item-card {
    background-color: #f9f9f9;
    padding:15px;
    margin-bottom:8px;
}
.right {
    text-align:right;
}
</style>

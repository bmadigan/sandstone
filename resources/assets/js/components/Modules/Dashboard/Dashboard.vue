<template>
<div class="bg-soft p-xs-y-5">
    <div class="container m-xs-b-4">
        <div class="m-xs-b-6">
            <div class="card">
                <div class="row">
                    <div class="col col-md-4 border-md-r">
                        <div class="card-section p-md-r-2 text-center text-md-left">
                            <h3 class="text-base wt-normal m-xs-b-1">Total Customers</h3>
                            <div class="text-jumbo wt-bold">
                                {{ totalCustomers }}
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-4 border-md-r">
                        <div class="card-section p-md-x-2 text-center text-md-left">
                            <h3 class="text-base wt-normal m-xs-b-1">Total Products Sold</h3>
                            <div class="text-jumbo wt-bold">
                                {{ totalProductsSold }}
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="card-section p-md-l-2 text-center text-md-left">
                            <h3 class="text-base wt-normal m-xs-b-1">Total Revenue</h3>
                            <div class="text-jumbo wt-bold">
                                {{ totalRevenue }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h2 class="m-xs-b-2 text-lg">Recent Orders</h2>
            <div class="card">
                <div class="card-section">

                    <vue-simple-spinner message="Loading..." v-if="isLoading"></vue-simple-spinner>

                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-left">Email</th>
                                <th class="text-left">Order Num</th>
                                <th class="text-left">Amount</th>
                                <th class="text-left">Card</th>
                                <th class="text-left">Purchased</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr v-for="order in recentOrders">
                                    <td>{{ order.customer_email }}</td>
                                    <td>#{{ order.order_number }}</td>
                                    <td>{{ order.total_paid | currency }}</td>
                                    <td>
                                        <span class="text-dark-soft">****</span>
                                        {{ order.cc_last_4 }}
                                        <small>({{ order.cc_brand }})</small>
                                    </td>
                                    <td class="text-dark-soft">{{ order.created_at | shortDate }}</td>
                                </tr>

                        </tbody>
                    </table>

                </div>
            </div>
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
                userId:             0,
                recentOrders:       [],
                totalCustomers:     0,
                totalProductsSold:  0,
                totalRevenue:       0,
                isLoading:          false,
            }
        },

        methods: {
            fetchRecentOrders() {
                this.startSpinner();
                axios.get('/api/orders/recent')
                    .then(response => {
                        this.recentOrders = response.data;
                        this.stopSpinner();
                    }).catch(error => {
                        alert({ type: 'error', text: 'Server error retreiving recent orders' });
                        console.log(error.message);
                        this.stopSpinner();
                    });
            },
            fetchTotalCustomers() {
                axios.get('/api/customers/total')
                    .then(response => {
                        this.totalCustomers = response.data;
                    }).catch(error => {
                        alert({ type: 'error', text: 'Server could not fetch total customers' });
                        console.log(error.message);
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
            this.fetchTotalCustomers();
            this.fetchRecentOrders();
        }
    }
</script>

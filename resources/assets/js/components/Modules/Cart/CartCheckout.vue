<template>
    <div class="mx-auto m-xs-t-2" v-if="amount > 0">
        <button class="btn btn-primary"
                @click="openStripe"
                :class="{ 'btn-loading': isLoading }"
                :disabled="isLoading">CHECKOUT</button>
    </div>
</template>

<script>
    import Spinner      from 'vue-simple-spinner'
    import axios        from 'axios'

    export default {
        components: { Spinner },
        props: [
            'amount'
        ],
        data() {
            return {
                stripeHandler:  null,
                isLoading:      false,
            }
        },
        computed: {
            description() {
                return `Payment for ${this.productName}`
            },
            totalPrice() {
                return this.amount
            },
            priceInDollars() {
                return (this.amount / 100).toFixed(2)
            },
            totalPriceInDollars() {
                return (this.totalPrice / 100).toFixed(2)
            },
        },
        methods: {
            initStripe() {
                const handler = StripeCheckout.configure({
                    key: App.stripePublicKey
                })
                window.addEventListener('popstate', () => {
                    handler.close()
                })
                return handler
            },
            openStripe(callback) {
                this.stripeHandler.open({
                    name: 'Pilaster Storefront',
                    description: 'Checkout',
                    currency: "usd",
                    allowRememberMe: false,
                    panelLabel: 'Pay {{amount}}',
                    amount: this.totalPrice,
                    image: '/images/checkout-icon.png',
                    token: this.makePayment,
                })
            },
            makePayment(token) {
                this.isLoading = true
                axios.post(`/api/checkout`, {
                    email: token.email,
                    payment_token: token.id,
                    client_ip: token.client_ip,
                    cc_last_4: token.card.last4,
                    cc_brand: token.card.brand
                }).then(response => {
                    window.location.href="/cart/invoice/" + response.data.orderId;
                }).catch(response => {
                    console.log('Error: ' + response);
                    this.isLoading = false
                })
            }
        },
        created() {
            this.stripeHandler = this.initStripe()
        }
    }
</script>

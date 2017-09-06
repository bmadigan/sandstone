<template>
    <div>
        <vue-simple-spinner message="Loading..." v-if="isLoading"></vue-simple-spinner>

        <table class="table mt3">
            <thead>
                <tr>
                    <th>Contract</th>
                    <th>Buyer</th>
                    <th>Released At</th>
                    <th>Total Released</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="contract in contracts">
                    <td class="ph2">
                        {{ contract.contract_name }}
                        <br><small>ID: {{ contract.contract_number }}</small>
                    </td>
                    <td class="ph2">
                        {{ contract.buyer.company_name }}
                        <br><small>E: {{ contract.buyer.contact_email }}</small>
                    </td>
                    <td>{{ contract.released_date }}</td>
                    <td>{{ contract.released_weight }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import Spinner from 'vue-simple-spinner'
    export default {
        components: { Spinner },

        data() {
            return {
                contracts: '',
                isLoading: false
            }
        },

        methods: {
            fetchContracts() {
                this.startSpinner();
                axios.get('/api/contracts')
                    .then(response => {
                        this.contracts = response.data.data;
                        this.stopSpinner();
                    }).catch(error => {
                        alert({ type: 'error', text: 'Server error retreiving contracts' });
                        console.log(error);
                        this.stopSpinner();
                    });
            },
            startSpinner() {
                this.isLoading = true;
            },
            stopSpinner() {
                this.isLoading = false;
            }
        },

        created() {
            this.fetchContracts();
        }

    }
</script>

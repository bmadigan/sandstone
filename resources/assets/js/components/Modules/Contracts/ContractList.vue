<template>
    <div>
        <vue-simple-spinner message="Loading..." v-if="isLoading"></vue-simple-spinner>

        <div class="place-to-the-right mb-12">
            <form id="search" v-on:submit.prevent="searchContracts">
                <input name="query" v-model="searchQuery" placeholder="Search Contracts ...">
            </form>
        </div>
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
                        <br><small>E:
                            <a :href="'mailto:' + contract.buyer.contact_email">{{ contract.buyer.contact_email }}</a>
                        </small>
                    </td>
                    <td>{{ contract.released_date }}</td>
                    <td>{{ contract.released_weight }}</td>
                </tr>
            </tbody>
        </table>

        <div class="pagination">
            <span v-if="pagination.prevLink">
                <a @click="prevLink" :class="cursorCss">&laquo; Prev</a>
            </span>
            Page {{ pagination.currentPage }} of {{ pagination.lastPage }}
            <span v-if="pagination.nextLink">
                <a @click="nextLink" :class="cursorCss">Next &raquo;</a>
            </span>
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
                contracts:      '',
                isLoading:      false,
                searchQuery:    '',
                pagination: {
                    currentPage:    1,
                    totalRecords:   0,
                    perPage:        10,
                    lastPage:       1,
                    nextLink:       '',
                    prevLink:       ''
                },
                cursorCss:      'cursor'
            }
        },

        methods: {
            fetchContracts() {
                this.startSpinner();
                axios.get('/api/contracts')
                    .then(response => {
                        this.contracts = response.data.data;
                        this.initPagination(response.data);
                        this.stopSpinner();
                    }).catch(error => {
                        alert({ type: 'error', text: 'Server error retreiving contracts' });
                        console.log(error.message);
                        this.stopSpinner();
                    });
            },

            searchContracts() {
                this.startSpinner();
                axios.get('/api/contracts?searchQuery=' + this.searchQuery)
                    .then(response => {
                        this.contracts = response.data.data;
                        this.initPagination(response.data);
                        this.stopSpinner();
                    }).catch(error => {
                        alert({ type: 'error', text: 'Server error retreiving contracts' });
                        console.log(error.message);
                        this.stopSpinner();
                    });
            },

            // Pagination methods
            initPagination(data) {
                this.pagination.currentPage = data.meta.current_page;
                this.pagination.lastPage = data.meta.last_page;
                this.pagination.perPage = data.meta.per_page;
                this.pagination.totalRecords = data.meta.total;
                this.pagination.prevLink = data.links.prev;
                this.pagination.nextLink = data.links.next;
            },
            prevLink() {
                this.startSpinner();
                axios.get(this.pagination.prevLink)
                    .then(response => {
                        this.contracts = response.data.data;
                        this.initPagination(response.data);
                        this.stopSpinner();
                    }).catch(error => {
                        alert({ type: 'error', text: 'Server error retreiving contracts' });
                        console.log(error.message);
                        this.stopSpinner();
                    });
            },
            nextLink() {
                this.startSpinner();
                axios.get(this.pagination.nextLink)
                    .then(response => {
                        this.contracts = response.data.data;
                        this.initPagination(response.data);
                        this.stopSpinner();
                    }).catch(error => {
                        alert({ type: 'error', text: 'Server error retreiving contracts' });
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
            this.fetchContracts();
        }

    }
</script>

<style>
.place-to-the-right {
    text-align: right;
}
.cursor {
    padding-left: 10px;
    padding-right: 10px;
}
</style>

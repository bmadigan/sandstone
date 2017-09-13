<template>
    <div class="alert alert-flash" :class="csstype" role="alert" v-show="show">
        {{ body }}
    </div>
</template>

<script>
    export default {
        props: ['message', 'css'],

        data() {
            return {
                body: '',
                csstype: 'alert-success',
                show: false
            }
        },

        created() {
            console.log('I am created');
            if(this.message) {
                this.flash(this.message, this.css);
            }

            // This event listener is helpful if we want to flash this
            // event from within Vue itself
            window.events.$on('flash', (message, css) => {
                this.flash(message, css);
            });
        },

        methods: {
            flash(message, css) {
                this.body = this.message;
                this.csstype = this.css;
                this.show = true;

                console.log('CSS: ' + this.css);

                this.hideFlash();
            },

            hideFlash() {
                setTimeout(() => {
                    this.show = false;
                }, 3000);
            }
        }
    }
</script>

<style>
.alert-flash {
    position: fixed;
    right: 25px;
    bottom: 125px;
}
</style>

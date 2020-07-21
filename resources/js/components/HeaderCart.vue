<template>
    <v-menu offset-y class="header-cart">
        <template v-slot:activator="{ on, attrs }">
            <v-btn
                depressed
                v-bind="attrs"
                v-on="on"
            >
                <v-icon>mdi-cart-outline</v-icon>
                <span class="price mr-1">${{totalPrice}}</span>
                <span class="header-cart--quantity deep-orange">{{totalQuantity}}</span>
            </v-btn>
        </template>
        <v-list>
            <v-list-item @click="route('order')">
                <v-list-item-title>Order Now</v-list-item-title>
            </v-list-item>
            <v-list-item @click="route('cart')">
                <v-list-item-title>Show Cart</v-list-item-title>
            </v-list-item>
        </v-list>
    </v-menu>
</template>

<script>
    export default {
        props: ['cart'],
        data() {
            return {
                totalPrice: 0,
                totalQuantity: 0
            }
        },
        methods: {
            route(route) {
                location.href = route;
            }
        },
        mounted() {
            this.totalQuantity = this.cart.totalQuantity;
            this.totalPrice = this.cart.totalPrice;
            this.$root.$on('change-cart', (data) => {
                this.totalQuantity = data.totalQuantity;
                this.totalPrice = data.totalPrice;
            });
        }
    }
</script>

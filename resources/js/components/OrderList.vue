<template>
    <div>
        <v-simple-table class="rounded-circle">
            <tbody>
            <tr v-for="item in items" :key="item.id">
                <td><b>{{ item.product }}</b> x {{ item.quantity }}</td>
                <td class="text-right"><b>${{ item.totalPrice }}</b></td>
            </tr>
            <tr class="grey--text">
                <td>+ Delivery</td>
                <td class="text-right"><b>${{deliveryCost}}</b></td>
            </tr>
            <tr class="deep-orange--text">
                <td><b>Total:</b></td>
                <td class="text-right"><b>${{totalPriceInUs}} / &euro;{{totalPriceInEu}}</b></td>
            </tr>
            </tbody>
        </v-simple-table>
    </div>
</template>

<script>
    const CartMixin = require('../mixins/CartMixin').default;
    export default {
        props: ['items', 'total'],
        mixins: [CartMixin],
        data: () => ({
            totalPriceInUs: 0,
            totalPriceInEu: 0,
            totalQuantity: 0,
            deliveryCost: 0
        }),
        mounted() {
            this.totalPriceInUs = this.total.priceInUs;
            this.totalPriceInEu = this.total.priceInEu;
            this.totalQuantity = this.total.quantity;
            this.deliveryCost = this.total.deliveryCost;
        }
    }
</script>

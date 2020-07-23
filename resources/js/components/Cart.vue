<template>
    <div>
        <v-data-table
            :headers="headers"
            :items="items"
            item-key="id"
            hide-default-footer
            class="elevation-1"
        >
            <template v-slot:body.append>
                <tr>
                    <td><b>Total</b></td>
                    <td class="text-right"></td>
                    <td class="text-right"><b>{{totalQuantity}}</b></td>
                    <td class="text-right"><b>${{totalPrice}}</b></td>
                    <td></td>
                </tr>
            </template>
            <!-- Footer -->
            <template v-slot:footer>
                <div class="p-2 d-flex">
                    <div class="p-2 grey--text">Click on the <b>Quantity</b> to change</div>
                    <v-spacer></v-spacer>
                    <!-- Make order -->
                    <v-btn
                        href="/order"
                        class="text-decoration-none"
                        depressed
                        rounded
                        color="deep-orange lighten-1"
                        :disabled="!totalQuantity">
                        <span class="white--text">Make Order</span>
                    </v-btn>
                </div>
            </template>
            <!-- Delete item -->
            <template v-slot:item.closable="{ item }">
                <v-btn @click="remove(item)" text fab small>
                    <v-icon dark>mdi-close</v-icon>
                </v-btn>
            </template>
            <!-- Quantity -->
            <template v-slot:item.quantity="props">
                <v-edit-dialog
                    :return-value.sync="props.item.quantity"
                    large
                    persistent
                    @save="save(props.item)"
                > {{ props.item.quantity }}
                    <template v-slot:input>
                        <v-text-field
                            v-model="props.item.quantity"
                            type="number"
                            min="1"
                            label="Edit"
                            single-line
                        ></v-text-field>
                    </template>
                </v-edit-dialog>
            </template>
        </v-data-table>
    </div>
</template>

<script>
    const CartMixin = require('../mixins/CartMixin').default;
    export default {
        props: ['cart'],
        mixins: [CartMixin],
        data() {
            return {
                items: [],
                totalPrice: 0,
                totalQuantity: 0,
                headers: [
                    {
                        text: 'Pizza',
                        align: 'start',
                        sortable: false,
                        value: 'name',
                    },
                    {
                        text: 'Price per unit',
                        value: 'productPrice',
                        align: 'end'
                    },
                    {
                        text: 'Quantity',
                        value: 'quantity',
                        align: 'end'
                    },
                    {
                        text: 'Total price',
                        value: 'totalPrice',
                        align: 'end'
                    },
                    {
                        text: '',
                        value: 'closable',
                        align: 'end'
                    }
                ]
            }
        },
        computed: {},
        watch: {},
        methods: {
            save (item) {
                this.changeQuantity(item.id, item.quantity).then((response) => {
                    if(response.data.success){
                        const data = response.data.data;
                        item.totalPrice = this.formatPrice(data.totalItemPrice);
                        this.totalQuantity = data.totalQuantity;
                        this.totalPrice = data.totalPrice;
                    }
                });
            },
            remove (item) {
                const id = item.id;

                this.deleteItem(id).then((response) => {
                    if(response.data.success){
                        const data = response.data.data;
                        this.totalQuantity = data.totalQuantity;
                        this.totalPrice = data.totalPrice;

                        this.items.forEach((element, index) => {
                            if(id === element.id){
                                this.items.splice(index, 1);
                            }
                        })
                    }
                });
            }

        },
        mounted() {
            const items = [],
                cart = this.cart;

            this.totalPrice = cart.totalPrice;
            this.totalQuantity = cart.totalQuantity;

            for(const prop in cart.items){
                const item = cart.items[prop],
                    product = item.item;

                items.push({
                    id: product.id,
                    name: product.name,
                    productPrice: this.formatPrice(product.price),
                    totalPrice: this.formatPrice(item.price),
                    quantity: item.quantity,
                    closable: true
                });
            }

            this.items = items;
        }
    }
</script>

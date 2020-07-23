<template>
    <v-menu
        open-on-hover
        bottom offset-y
        transition="scale-transition"
        :rounded="rounded"
        :close-on-content-click="false"
        class="header-cart">
        <template v-slot:activator="{ on, attrs }">
            <v-btn
                depressed
                href="/cart"
                v-bind="attrs"
                v-on="on"
                class="text-decoration-none cart-btn"
            >
                <span class="price mr-1">${{totalPrice}}</span>
                <span class="total-quantity deep-orange">{{totalQuantity}}</span>
                <svg width="13" height="11" fill="none" class="to-basket">
                    <path d="M1 5.483h11m0 0L7.286 1M12 5.483L7.286 10"
                          stroke="#ff5722"
                          stroke-width="1.5"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                    >
                    </path>
                </svg>
            </v-btn>
        </template>
        <v-card min-width="300">
            <template v-if="items.length">
                <div v-for="item in items" class="d-flex align-center item">
                    <div class="col-5">
                        {{item.name}}
                    </div>
                    <div class="col-4 text-right">
                        <div class="quantity d-flex align-center justify-content-between p-1">
                            <button class="minus control" @click="change(item.id, --item.quantity)">
                                <svg width="10" height="10">
                                    <rect y="4" width="10" height="2" fill="#595959" rx="1"/>
                                </svg>
                            </button>
                            <div class="qu">{{item.quantity}}</div>
                            <button class="plus control" @click="change(item.id, ++item.quantity)">
                                <svg width="10" height="10">
                                    <rect x="4" width="2" height="10" fill="#595959" rx="1"/>
                                    <rect y="4" width="10" height="2" fill="#595959" rx="1"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="col text-right">
                        <b>${{item.price}}</b>
                    </div>
                </div>
            </template>
            <div v-else class="p-3 text-center">
                Cart is empty
            </div>
        </v-card>
    </v-menu>
</template>

<script>
    const CartMixin = require('../mixins/CartMixin').default;
    export default {
        props: ['cart'],
        mixins:[CartMixin],
        data() {
            return {
                totalPrice: 0,
                totalQuantity: 0,
                items: [],
                rounded: 'lg'
            }
        },
        methods: {
          change(id, quantity){
              this.changeQuantity(id, quantity);
          }
        },
        created() {
            if (this.cart) {
                const items = [],
                    cart = this.cart;

                this.totalPrice = cart.totalPrice;
                this.totalQuantity = cart.totalQuantity;

                for (const prop in cart.items) {
                    const item = cart.items[prop],
                        product = item.item;

                    items.push({
                        id: product.id,
                        name: product.name,
                        image: product.preview_img,
                        price: item.price,
                        quantity: item.quantity
                    });
                }

                this.items = items;
            }
            this.$root.$on('change-cart', (data) => {
                this.totalQuantity = data.totalQuantity;
                this.totalPrice = data.totalPrice;

                this.items = data.items;
            });
        }
    }
</script>
<style scoped>
    .v-card {
        font-size: 0.8rem;
    }

    .item {
        border-bottom: 1px solid #eeeeee;
    }

    .quantity {
        border: 1px solid #cccccc;
        width: 100%;
        border-radius: 0.3rem;
    }

    .to-basket {
        position: absolute;
        right: 0;
        opacity: 0;

        transform: translateX(-5px);
        transition: transform 0.2s ease-in-out 0s, opacity 0.2s ease-in-out 0s;
    }

    .total-quantity {
        color: white;
        border-radius: 25px;
        min-width: 22px;
        min-height: 22px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 0.7rem;

        opacity: 1;
        transform: translateX(0);
        transition: transform 0.2s ease-in-out 0s, opacity 0.2s ease-in-out 0s;
    }

    .cart-btn:hover .to-basket{
        opacity: 1;
        transform: translateX(0px);
    }

    .cart-btn:hover .total-quantity{
        opacity: 0;
        transform: translateX(-5px);
    }
</style>

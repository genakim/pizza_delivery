<template>
    <v-card :loading="false" flat class="product d-flex flex-column justify-content-between">
        <v-card-text>
            <v-img
                @click="dialog = true"
                :src="item.preview_img"
                lazy-src="/storage/lazy.svg"
                max-height="240"
                height="240"
                contain>
                <v-btn
                    @click="dialog = true"
                    class="product__btn-detail"
                    fab
                    small
                    absolute
                    bottom
                    right
                    depressed
                ><v-icon dark>mdi-dots-vertical</v-icon></v-btn>
            </v-img>
            <v-card-title class="p-0">{{item.name}}</v-card-title>
            <div class="desc">{{item.description}}</div>
        </v-card-text>
        <v-card-text class="d-flex align-center pt-0">
            <span class="product__price deep-orange--text" v-html="formatPrice(item.price)"></span>
            <v-spacer></v-spacer>
            <v-btn
                @click="addToCart"
                depressed
                rounded
                outlined
                color="deep-orange lighten-1"
                class="product__btn-to-basket"
            >Add to cart</v-btn>
        </v-card-text>

        <!-- Detail Modal -->
        <v-dialog v-model="dialog" max-width="900">
            <v-card class="product-detail">
                <v-btn
                    @click="dialog = false"
                    class="product-detail__btn-close"
                    text
                    fab small absolute top right depressed
                >
                    <v-icon dark>mdi-close</v-icon>
                </v-btn>
                <v-row class="p-md-5" no-gutters>
                    <v-col cols="12" sm="6" md="7">
                        <v-img
                            :src="item.full_img"
                            lazy-src="/storage/lazy.svg"
                            contain>
                        </v-img>
                    </v-col>
                    <v-col cols="12" sm="6" md="5" class="d-flex flex-column justify-center">
                        <v-card-title class="headline">{{item.name}}</v-card-title>
                        <v-card-text>
                            <div class="product__price deep-orange--text" v-html="formatPrice(item.price)"></div>
                            <div class="mt-2">{{item.description}}</div>
                        </v-card-text>
                        <v-card-actions>
                            <v-row no-gutters>
                                <v-col cols="3" class="d-flex flex-column justify-center">
                                    <v-text-field
                                        v-model="quantity"
                                        class="mr-2"
                                        type="number"
                                        min="1"
                                        outlined
                                        dense
                                        hide-details
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="9" class="d-flex flex-column justify-center">
                                    <v-btn
                                        @click="addToCart"
                                        depressed
                                        rounded
                                        color="deep-orange lighten-1"
                                        class="product__btn-to-basket"
                                    ><span class="white--text">Add to cart</span></v-btn>
                                </v-col>
                            </v-row>
                        </v-card-actions>
                    </v-col>
                </v-row>
            </v-card>
        </v-dialog>
    </v-card>
</template>

<script>
    const CartMixin = require('../mixins/CartMixin').default;
    export default {
        props: ['item'],
        mixins:[CartMixin],
        data() {
            return {
                dialog: false,
                quantity: 1
            }
        },
        watch: {
            dialog (){
                if(this.dialog === false){
                    this.quantity = 1;
                }
            }
        },
        methods: {
            addToCart(){
                this.addItem(this.item.id, this.quantity);
            }
        }
    }
</script>

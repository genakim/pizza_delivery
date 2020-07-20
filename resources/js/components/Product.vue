<template>
    <v-card :loading="false" flat class="product d-flex flex-column justify-content-between">

        <v-card-text>
            <v-img
                :src="item.preview_img"
                lazy-src="/storage/lazy.svg"
                max-height="240"
                height="240"
                contain>
                <v-btn
                    class="product__btn-detail"
                    v-bind="attrs"
                    v-on="on"
                    fab small absolute bottom right depressed

                >
                    <v-icon dark>mdi-dots-vertical</v-icon>
                </v-btn>
            </v-img>
            <v-card-title class="p-0">{{item.name}}</v-card-title>
            <div class="desc">{{item.description}}</div>
            <!--            <div class="my-4 subtitle-1">-->
            <!--                <v-row align="center">-->
            <!--                    <v-col cols="8"></v-col>-->
            <!--                    <v-col cols="4" class="d-flex">-->
            <!--                        <v-text-field outlined dense hide-details type="number" min="1" value="1"></v-text-field>-->
            <!--                    </v-col>-->
            <!--                </v-row>-->
            <!--            </div>-->

            <!--            <v-card-actions class="d-flex justify-center">-->
            <!--                -->
            <!--            </v-card-actions>-->
        </v-card-text>
        <v-card-text class="d-flex align-center pt-0">
            <span class="product__price deep-orange--text">${{item.price}}</span>
            <v-spacer></v-spacer>
            <v-btn depressed rounded outlined color="deep-orange lighten-1" class="product__btn-to-basket">
                Add to cart
            </v-btn>
        </v-card-text>
        <v-dialog
            v-model="dialog"
            width="500"
        ></v-dialog>
    </v-card>
</template>

<script>
    export default {
        props: ['item'],
        data () {
            return {
                dialog: false
            }
        }
    }
</script>

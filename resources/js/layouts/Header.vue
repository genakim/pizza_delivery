<template>
    <header>
        <v-container>
            <v-row>
                <v-col  cols="12" sm="4"></v-col>
                <v-col class="header-content" cols="12" sm="4">
                    <div class="font-weight-bold">Pizza</div>
                    <div class="logo"></div>
                    <div class="font-weight-bold">Delivery</div>
                </v-col>
                <v-col class="d-flex justify-end" cols="12" sm="4">
                    <v-menu offset-y>
                        <template v-slot:activator="{ on, attrs }">
                            <v-btn
                                depressed
                                v-bind="attrs"
                                v-on="on"
                            >
                                <v-icon>mdi-cart-outline</v-icon>
                                $0
                            </v-btn>
                        </template>
                        <v-list>
                            <v-list-item>
                                <v-list-item-title>Order Now</v-list-item-title>
                            </v-list-item><v-list-item>
                            <v-list-item-title>To Basket</v-list-item-title>
                        </v-list-item>
                        </v-list>
                    </v-menu>
                </v-col>
            </v-row>
        </v-container>
    </header>
</template>

<script>
    export default {
        mounted() {
        }
    }
</script>

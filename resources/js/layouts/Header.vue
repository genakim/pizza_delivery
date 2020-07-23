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
                    <header-cart :cart="cart"></header-cart>
                </v-col>
            </v-row>
        </v-container>
    </header>
</template>

<script>
    export default {
        props: ['cart'],
        mounted() {}
    }
</script>

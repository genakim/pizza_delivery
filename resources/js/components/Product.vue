<template>
    <v-card :loading="true">
        <v-img height="250" src="https://cdn.vuetifyjs.com/images/cards/cooking.png"></v-img>
        <v-card-title class="pb-0">Cafe Badilico</v-card-title>
        <v-card-text>
            <div class="my-4 subtitle-1">
                <v-row align="center">
                    <v-col cols="8"><b>$5000</b></v-col>
                    <v-col cols="4" class="d-flex">
                        <v-text-field outlined dense hide-details type="number" min="1" value="1"></v-text-field>
                    </v-col>
                </v-row>
            </div>
            <div class="desc">Small plates, salads & sandwiches - an intimate setting with 12 indoor seats plus patio seating.</div>
        </v-card-text>

        <v-divider class="m-0"></v-divider>

        <v-card-actions class="d-flex justify-center">
            <v-btn color="deep-orange lighten-1" class="btn-to-basket" text> Add to card</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

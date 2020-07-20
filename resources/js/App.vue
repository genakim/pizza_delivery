<template>
    <v-app id="inspire">
        <v-main>
            <app-header></app-header>
            <v-container>
                <v-row>
                    <v-col v-for="n in 12" cols="12" sm="6" md="4" :key="n">
                        <product></product>
                    </v-col>
                </v-row>
            </v-container>
            <app-footer></app-footer>
        </v-main>
    </v-app>
</template>

<script>
    export default {
        name: "App",
        data: () => ({
            drawer: null,
        })
    }
</script>

<style scoped>

</style>

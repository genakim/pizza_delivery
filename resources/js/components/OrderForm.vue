<template>
    <v-form class="p-4 order-form" ref="form">
        <v-text-field
            v-model="name"
            :rules="nameRules"
            label="Name *"
            required
        ></v-text-field>
        <v-text-field
            v-model="phone"
            label="Phone *"
            :rules="phoneRules"
            required
        ></v-text-field>
        <v-text-field
            v-model="address"
            :rules="addressRules"
            label="Delivery address *"
            required
        ></v-text-field>
        <v-text-field label="Comment"></v-text-field>

        <div class="d-flex justify-center">
            <v-btn
                depressed
                rounded
                color="deep-orange lighten-1"
                class="mr-4"
                @click="confirm"
            ><span class="white--text">Order Now</span></v-btn>
        </div>

        <v-dialog v-model="dialog" max-width="500" persistent>
            <v-card class="p-3 text-center">
                <v-card-title class="d-flex justify-center">{{message}}</v-card-title>
                <v-card-actions class="d-flex justify-center">
                    <v-btn
                        @click="finish"
                        depressed
                        rounded
                        color="deep-orange lighten-1"
                        class="product__btn-to-basket"
                    ><span class="white--text">I got it!</span></v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-form>
</template>

<script>
    export default {
        data: () => ({
            name: '',
            address: '',
            phone: '',
            comment: '',
            message: '',
            dialog: false,
            valid: true,
            nameRules: [
                v => !!v || 'Name is required'
            ],
            addressRules: [
                v => !!v || 'Address is required'
            ],
            phoneRules: [
                v => !!v || 'Phone number is required',
                v => /^(\+|\d)[\d]*$/.test(v) || 'Phone number must be valid',
            ]
        }),

        methods: {
            confirm () {
                if(this.$refs.form.validate()){
                    axios({
                        url: '/order/confirm',
                        method: 'get',
                        params: {}
                    }).then((response) => {
                        if (response.data.success) {
                            this.message = response.data.message;
                            this.dialog = true;
                        }
                    });
                }
            },
            finish() {
                location.href = '/';
            }
        },
    }
</script>

<style>
    .order-form {
        border-radius: 10px;
        border: 2px solid #ff6f43
    }
</style>

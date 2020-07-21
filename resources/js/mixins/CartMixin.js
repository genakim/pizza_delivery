export default {
    methods: {
        addItem(id, quantity) {
            return this.request(`add_item/${id}`, {
                quantity: quantity
            });
        },
        deleteItem(id) {
            return this.request(`delete_item/${id}`);
        },
        changeQuantity(id, quantity) {
            return this.request(`change_quantity/${id}`, {
                quantity: quantity
            });
        },
        request(url, params = {}){
            return axios({
                url: `/cart/${url}`,
                method: 'get',
                params
            }).then((response) => {
                if (response.data.success) {
                    this.$root.$emit('change-cart', response.data.data);
                }
                return response;
            });
        },
        formatPrice(price){
            return `$${parseFloat(price)}`;
        }
    }
}

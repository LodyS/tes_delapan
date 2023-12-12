<template>
    <div> 
        <div v-for="product in Products" :key="product.id">
            {{product.name}}
        </div>
        <infinite-loading @distance="1" @infinite="handleLoadMore"></infinite-loading>
    </div>
</template>

<script>
import $ from 'jquery';

export default {
    data() {
        return {
            Products: [],
            page: 1,
        };
    },
    methods: {
        handleLoadMore($state) {
            this.$http.get('/data-produk?page=' + this.page)
                .then(res => {
                    return res.json();
                }).then(res => {
                    
                    $.each(res.data, (key, value) => { this.Products.push(value) });

                    $state.loaded();
                });
            this.page = this.page + 1;
        },
    },
}
</script>
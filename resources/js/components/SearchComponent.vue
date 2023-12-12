<template>
    <div>
        <input type="text" v-model="keywords">
        <ul v-if="results.length > 0">
            <li v-for="result in results" :key="result.id" v-text="result.title"></li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            keywords: null,
            results: []
        };
    },
    watch: {
        keywords(after, before) {
            this.search_keyword();
        }
    },
    methods: {
        search_keyword() {
            axios.get('/blog-data-search', { 
                params: { 
                    keywords: this.keywords 
                } 
            })
            .then(response => this.results = response.data)
            .catch(error => {});
        }
    }
}
</script>
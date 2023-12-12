<template>
    <div>
        <h2>Implement jQuery DataTable in Vue Js</h2>
        <table class="table" id="datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>URL</th>
                    <th>Category</th>
                </tr>
            </thead>
           
        </table>
    </div>
</template>

<script>
import $ from "jquery";

export default {
    data: function () {
        return {
            columns: [{
                    label: 'id',
                    field: 'id'
                },
                {
                    label: 'title',
                    field: 'title'
                },
                {
                    label: 'url',
                    field: 'url'
                },
                {
                    label: 'category',
                    field: 'category'
            }],
            blogs: [],
            page: 1,
            filter:  '',
            perPage: 10,
            search : ''
        };
    },
    methods: {
        showBlogs: function () {
            axios.get('data-blog').then(function (res) {
                this.rows = res.data;
            }.bind(this));
        }
    },
    created: function () {
        this.showBlogs()
    }
};
</script>
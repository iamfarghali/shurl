<template>
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Url</th>
                </tr>
            </thead>
            <tbody>
                <template v-if="hasUrls()" >
                    <url v-for="(url, id) in urls" :key="id" :url="url"></url>
                </template>
                <no-data v-else></no-data>
            </tbody>
        </table>
    </div>
</template>

<script>
    import Url from './Url';
    import NoData from "./NoData";

    export default {
        props: ['urls'],
        data() {
            return {
            };
        },
        components: {Url, NoData},
        methods: {
            hasUrls() {
                return this.urls.length > 0;
            }
        }

    }
</script>

<template>
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
            <create-url @newUrl="appendUrl"></create-url>
        </div>
        <div class="col-md-12">
            <show-urls :urls="appUrls"></show-urls>
        </div>
    </div>
</template>
<script>
    import ShowUrls from './ShowUrls';
    import CreateUrl from './CreateUrl';

    export default {
        props: ['urls'],
        data: function () {
            return {
                appUrls: this.urls
            };
        },
        components: {
            ShowUrls,
            CreateUrl
        },
        created() {
            this.fetch('/urls');
        },
        methods: {
            fetch(endpoint) {
                axios.get(endpoint).then(({data}) => {
                    this.appUrls.push(data);
                });
            },
            appendUrl(data) {
                this.appUrls.push(data);
            }
        }
    }
</script>

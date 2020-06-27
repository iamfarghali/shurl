<template>
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
            <create-url></create-url>
        </div>
        <div class="col-md-12">
            <show-urls :urls="urls"></show-urls>
        </div>
    </div>
</template>
<script>
    import ShowUrls from './ShowUrls';

    export default {
        props: ['urls'],
        components: {
            ShowUrls
        }
    }
</script>

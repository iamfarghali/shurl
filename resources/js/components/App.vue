<template>
    <div class="row justify-content-center">
        <show-urls :urls="urls"></show-urls>
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

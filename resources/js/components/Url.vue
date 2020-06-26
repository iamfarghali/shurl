<template>
    <tr>
        <td scope="row">{{url.id}}</td>
        <td>{{url.code}}</td>
        <td>{{url.url}}</td>
    </tr>
</template>

<script>
    export default {
        props: ['url']
    }
</script>

<template>
    <div>
        <form @submit.prevent="create">
            <div class="form-group">
                <label for="url">Your Url</label>
                <input type="text" v-model="url" name="url" id="url" class="form-control" placeholder="Short your URL.">
            </div>
            <button class="btn btn-primary">Create</button>
        </form>
    </div>
</template>

<script>

    export default {
        data() {
            return {
                url: null
            };
        },
        methods: {
            create() {
                axios.post('/urls', {url: this.url}).then(({data}) => {
                    this.url = null
                    this.$emit('newUrl', data);
                });
            }
        }

    }
</script>

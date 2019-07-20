<template>
    <div>
        <form action="#" @submit.prevent="post">
             <div class="form-grou">
                 <textarea v-model="body"  class="form-control"></textarea>

                 <button class="btn btn-secondary" type="submit">Post</button>
             </div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            body: null
        }
    },
    props: [
        'tweets'
    ],
    methods: {
        post () {
            axios.post('/tweets', {body: this.body}).then((response) => {
                this.tweets.unshift((response.data))
                this.body = null
            });
        }
    },
}
</script>